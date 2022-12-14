<?php
namespace App\Service;
use App\Repositories\FruitRepositoryInterface;
use Exception;

class FruitService
{
    protected $fruitRepository;
    
    public function __construct(
        FruitRepositoryInterface $fruitRepository
    )
    {
        $this->fruitRepository = $fruitRepository;
    }

    public function create(array $data)
    {
        try{

            $destination_path = "public/Fruit";
            $file = $data['image_url'];
            $file->storeAs($destination_path, $file->getClientOriginalName());
            //  $request['id_user'] = Auth::user()->id;
            $link = $file->getClientOriginalName();
            $data['image_url'] = '/storage/Fruit/'.$link;
            return $this->fruitRepository->create($data);
        } catch(Exception $e) {
            return null;
        }
    }

    public function update(array $data)
    {
        try{
            return $this->fruitRepository->update($data['id'], $data);
        } catch(Exception $e) {
            return null;
        }
    }

    public function getAll()
    {   
        try{
            return $this->fruitRepository->getAll();
        } catch(Exception $e) {
            return null;
        }
    }

    public function getFruitFollowId(int $id)
    {
        try{
            return $this->fruitRepository->find($id);
        } catch(Exception $e) {
            return null;
        }
    }

    public function searchFruit($data)
    {
        try{    
            return $this->fruitRepository->searchFruit($data);
        } catch(Exception $e) {
            return null;
        }
    }

    public function delete(int $id)
    {
        try{
            return $this->fruitRepository->delete($id);
        } catch(Exception $e) {
            return null;
        }
    }
}