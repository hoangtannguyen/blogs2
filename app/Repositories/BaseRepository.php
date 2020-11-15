<?php

namespace App\Repositories;

use App\Repositories\RepositoryInterface;

abstract class BaseRepository implements RepositoryInterface
{
    //model muốn tương tác
    protected $model;

   //khởi tạo
    public function __construct()
    {
        $this->setModel();
    }

    //lấy model tương ứng
    abstract public function getModel();

    /**
     * Set model
     */
    public function setModel()
    {
        $this->model = app()->make(
            $this->getModel()
        );
    }
    
    public function getAll()
    {
        return $this->model->all();
    }


    public function find($id)
    {
        $result = $this->model->find($id);

        if (!$result){
            $status = 200;
            $result = [];
            $message= 'Du lieu rong .....';

        }else {
            $status = 200;
            $message= 'Tim thay du lieu .....';
        }
            $data = [
                'status' => $status,
                'message' => $message,
                'data' => $result
            ];

        return $data;
    }


    public function edits($id)
    {
        $result = $this->model->find($id);
        return $result;
    }
    
    public function create($attributes = [])
    {
        $result = $this->model->create($attributes);
        
      
        if (!$result){
            $status = 500;
            $message = 'Create khong thanh cong ....';
        }else {
            $status = 201;
            $message = 'Create thanh cong ....';
        }

        $data = [
            'status' => $status,
            'message' => $message,
            'data' => $result
        ];


        return $result;
    }
    
    public function update($id, $attributes = [])
    {
        $result = $this->edits($id);

        if (!$result) {
            $result = [];
            $status = 200;
            $message = 'Khong tim thay du lieu';
     
        } else {
            $result->update($attributes);
            $status = 200;
            $message = 'Update thanh cong';
        } 

        $data = [
            'status' => $status,
            'message' => $message,
            'data' => $result
        ];

        return $result;
    }
    
    public function delete($id)
    {
        $result = $this->edits($id);

        if (!$result) {
            $status = 200;
            $message = "Khong tim thay";
            $result = [];

        } else {
            $result->delete();
            $status = 200;
            $message = "Xoa thanh cong!";
        }

        $data = [
            'status' => $status,
            'message' => $message,
            'data' => $result
        ];

        return $data;
    }

    public function getSoftDeletes()
    {
        $data = $this->model->getSoftDeletes();

        return $data;
    }

    public function findOnlyTrashed($id)
    {
        $result = $this->model->findOnlyTrashed($id);
        $status = 200;

        if (!$result)
            $status = 404;

        $data = [
            'status' => $status,
            'data' => $result
        ];

        return $data;
    }

    public function restore($id)
    {
        $chucvu = $this->model->findOnlyTrashed($id);

        $status = 404;
        $msg = "This factor salary not found";
        if ($chucvu) {
            $this->chuc_vu_Repository->restore($chucvu);
            $status = 200;
            $msg = "Restore success!";
        }

        $data = [
            'status' => $status,
            'msg' => $msg
        ];
        return $data;
    }

    public function deletetrash($id)
    {
        $chucvu = $this->model->findOnlyTrashed($id);

        $status = 404;
        $msg = "This factor salary not found";

        if ($chucvu) {
            $this->chuc_vu_Repository->delete($chucvu);
            $status = 200;
            $msg = "Delete success!";
        }

        $data = [
            'status' => $status,
            'msg' => $msg
        ];
        return $data;
    }
}

