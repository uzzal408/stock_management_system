<?php
namespace App\Repositories;

use App\Contracts\CustomerContract;
use App\Models\Customer;
use App\Repositories\BaseRepository;
use Illuminate\Http\UploadedFile;
use App\Traits\UploadAble;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;


class CustomerRepository extends BaseRepository implements CustomerContract
{
    use UploadAble;

    public function __construct(Customer $model)
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
    public function listCustomer(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns,$order,$sort);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function findCustomerById(int $id)
    {
        try{
            return $this->findOneOrFail($id);
        } catch (ModelNotFoundException $e){
            throw new ModelNotFoundException($e);
        }
    }

    public function createCustomer(array $params)
    {

        try{
            $collection = collect($params);
            $image = null;

            if($collection->has('image') && ($params['image'] instanceof UploadedFile)){
                $image = $this->uploadOne($params['image'],'images');
            }
            $status   = $collection->has('status') ? 1 : 0 ;
            $merge = $collection->merge(compact('image','status'));
            $content = new Customer($merge->all());
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
    public function updateCustomer(array $params)
    {
        $content = $this->findCustomerById($params['id']);
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

    public function deleteCustomer(int $id)
    {
        $content = $this->findCustomerById($id);
        if($content->image != null){
            $this->deleteOne($content->image);
        }
        $content->delete();
        return $content;
    }
}
