<?php
namespace App\Repositories;

use App\Contracts\CategoryContract;
use App\Models\Category;
use App\Repositories\BaseRepository;
use Illuminate\Http\UploadedFile;
use App\Traits\UploadAble;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;


class CategoryRepository extends BaseRepository implements CategoryContract
{
    use UploadAble;

    public function __construct(Category $model)
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
    public function listCategory(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns,$order,$sort);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function findCategoryById(int $id)
    {
        try{
            return $this->findOneOrFail($id);
        } catch (ModelNotFoundException $e){
            throw new ModelNotFoundException($e);
        }
    }

    public function createCategory(array $params)
    {

        try{
            $collection = collect($params);
            $image = null;

            if($collection->has('image') && ($params['image'] instanceof UploadedFile)){
                $image = $this->uploadOne($params['image'],'images');
            }
            $status   = $collection->has('status') ? 1 : 0 ;
            $merge = $collection->merge(compact('image','status'));
            $content = new Category($merge->all());
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
    public function updateCategory(array $params)
    {
        $content = $this->findCategoryById($params['id']);
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

    public function deleteCategory(int $id)
    {
        $content = $this->findCategoryById($id);
        if($content->image != null){
            $this->deleteOne($content->image);
        }
        $content->delete();
        return $content;
    }
}
