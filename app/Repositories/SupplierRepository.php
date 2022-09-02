<?php
namespace App\Repositories;

use App\Contracts\SupplierContract;
use App\Models\Supplier;
use App\Repositories\BaseRepository;
use Illuminate\Http\UploadedFile;
use App\Traits\UploadAble;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;


class SupplierRepository extends BaseRepository implements SupplierContract
{
    use UploadAble;

    public function __construct(Supplier $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listSupplier(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns,$order,$sort);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function findSupplierById(int $id)
    {
        try{
            return $this->findOneOrFail($id);
        } catch (ModelNotFoundException $e){
            throw new ModelNotFoundException($e);
        }
    }

    public function createSupplier(array $params)
    {

        try{
            $collection = collect($params);
            $image = null;

            if($collection->has('image') && ($params['image'] instanceof UploadedFile)){
                $image = $this->uploadOne($params['image'],'images');
            }
            $status   = $collection->has('status') ? 1 : 0 ;
            $merge = $collection->merge(compact('image','status'));
            $content = new Supplier($merge->all());
            $content->save();
            return $content;

        }catch (QueryException $exception){
            throw  new InvalidArgumentException($exception->getMessage());
        }
    }


    /**
     * @param array $params
     * @return mixed
     */
    public function updateSupplier(array $params)
    {
        $content = $this->findSupplierById($params['id']);
        $image = $content->image;

        $collection = collect($params)->except('_token');

        if ($collection->has('image') && ($params['image'] instanceof UploadedFile)){

            if($content->image !=null){
                $this->deleteOne($content->image);
            }

            $image = $this->uploadOne($params['image'],'images');
        }
        $status    = $collection->has('status') ? 1 : 0 ;
        $merge = $collection->merge(compact('status','image'));
        $content->update($merge->all());

        return $content;


    }

    public function deleteSupplier(int $id)
    {
        $content = $this->findSupplierById($id);
        if($content->image != null){
            $this->deleteOne($content->image);
        }
        $content->delete();
        return $content;
    }
}
