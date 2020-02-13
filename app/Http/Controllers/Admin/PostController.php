<?php namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;


class PostController extends CrudController {

  use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
  use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
  use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
  use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
  use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;

  public function setup() 
  {
      $this->crud->setModel("App\Models\Post");
      $this->crud->setRoute("admin/post");
      $this->crud->setEntityNameStrings('Post', 'Post');

      $this->crud->enableExportButtons();
      //$this->crud->setActionsColumnPriority(10000);
  }

  public function setupListOperation()
  {
    // $this->crud->addColumn([
    //   'name' => 'main_category_name', // The db column name
    //   'label' => "Main Category", // Table column heading
    //   'type' => 'Text'
    // ]);
   

  }

  public function setupCreateOperation()
  {
      //$this->crud->setValidation(TagCrudRequest::class);
      $fields  = [
        [  // Select
          'label' => "Main Category",
          'type' => 'select2',
          'name' => 'main_category_id', // the db column for the foreign key
          'entity' => 'main_category', // the method that defines the relationship in your Model
          'attribute' => 'main_category', // foreign key attribute that is shown to user
          'model' => "App\Models\Category",
       
          // optional
          'options'   => (function ($query) {
               return $query->orderBy('category_name', 'ASC')->get();
           }), // force the related options to be a custom query, instead of all(); you can use this to filter the results show in the select
          ],
        [
          'name' => 'main_category_name',
          'type' => 'text',
          'label' => "Main Category"
        ],
        [
          'name' => 'main_category_name',
          'type' => 'text',
          'label' => "Main Category"
        ]

      ];


      $this->curd->addFields($fields);
 
  }

  public function setupUpdateOperation()
  {
      $this->setupCreateOperation();
  }
}