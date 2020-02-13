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
    $this->crud->addColumn([
      'name' => 'main_category_name', // The db column name
      'label' => "Main Category", // Table column heading
      'type' => 'Text'
    ]);
    $this->crud->addColumn([
      'name' => 'description', // The db column name
      'label' => "Description", // Table column heading
      'type' => 'text'
    ]);
    $this->crud->addColumn([
      'name' => 'created_at', // The db column name
      'label' => "Recorder", // Table column heading
      'type' => 'Text'
    ]);
    $this->crud->addColumn([
      'name' => 'updated_at', // The db column name
      'label' => "Update Date", // Table column heading
      'type' => 'Text'
    ]);

  }

  public function setupCreateOperation()
  {
      //$this->crud->setValidation(TagCrudRequest::class);

      $this->crud->addField([
        'name' => 'main_category_name',
        'type' => 'text',
        'label' => "Main Category"
      ]);
      $this->crud->addField([
        'name' => 'description',
        'type' => 'textarea',
        'label' => "Description"
      ]);
      $this->crud->addField([
        'name' => 'created_at',
        'type' => 'date',
        'label' => "Record Date"
      ]);
      $this->crud->addField([
        'name' => 'updated_at',
        'type' => 'date',
        'label' => "Update Date"
      ]);
  }

  // public function create(){
  //   return "Hello World!";
  // }

  public function setupUpdateOperation()
  {
      $this->setupCreateOperation();
  }
}