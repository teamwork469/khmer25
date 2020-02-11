<?php namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;


class MainCategoryController extends CrudController {

  use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
  use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
  use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
  use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
  use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;

  public function setup() 
  {
      $this->crud->setModel("App\Models\MainCategory");
      $this->crud->setRoute("admin/maincategory");
      $this->crud->setEntityNameStrings('Main Category', 'Main Category');

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

    //   $this->crud->addField([
    //     'name' => 'main_category_name',
    //     'type' => 'text',
    //     'label' => "Main Category"
    //   ]);
  }

  public function setupUpdateOperation()
  {
      $this->setupCreateOperation();
  }
}