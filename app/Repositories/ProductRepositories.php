<?php
namespace App\Repositories;

use App\Contracts\ProductContract;
use App\Models\Product;
use App\Models\Stock;
use App\Repositories\BaseRepository;
use Illuminate\Http\UploadedFile;
use App\Traits\UploadAble;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;
use Illuminate\Support\Facades\DB;


class ProductRepositories extends BaseRepository implements ProductContract
{
    use UploadAble;

    public function __construct(Product $model)
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
    public function listProduct(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns,$order,$sort);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function findProductById(int $id)
    {
        try{
            return $this->findOneOrFail($id);
        } catch (ModelNotFoundException $e){
            throw new ModelNotFoundException($e);
        }
    }

    public function createProduct(array $params)
    {

        try{
            $collection = collect($params);
            $image = null;

            if($collection->has('image') && ($params['image'] instanceof UploadedFile)){
                $image = $this->uploadOne($params['image'],'images');
            }
            $status   = $collection->has('status') ? 1 : 0 ;
            $merge = $collection->merge(compact('image','status'));
            try {
                DB::beginTransaction();
                $content = new Product($merge->all());
                $content->save();
                $stock = new Stock();
                $stock->product_id = $content->id;
                $stock->save();
                DB::commit();
                return $content;
            }catch (\Exception $e){
                DB::rollBack();
            }

        }catch (QueryException $exception){
            throw  new InvalidArgumentException($exception->getMessage());
        }
    }


    /**
     * @param array $params
     * @return mixed
     */
    public function updateProduct(array $params)
    {
        $content = $this->findProductById($params['id']);
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

    public function deleteProduct(int $id)
    {
        $content = $this->findProductById($id);
        if($content->image != null){
            $this->deleteOne($content->image);
        }
        $content->delete();
        return $content;
    }
}
