<?php namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;


class GalleryImageController extends CrudController {

  use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
  use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
  use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
  use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
  use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
  use \Backpack\CRUD\app\Http\Controllers\Operations\CloneOperation;

  public function setup() 
  {
      $this->crud->setModel("App\Models\Gallery");
      $this->crud->setRoute("admin/gallery");
      $this->crud->setEntityNameStrings('gallery', 'gallery');

      $this->crud->enableExportButtons();
      //$this->crud->setActionsColumnPriority(10000);
      //$this->crud->enableBulkActions();
      $this->crud->enableDetailsRow();
  }

  public function setupListOperation()
  {
    $this->crud->addColumn([
      'name' => 'gallery_name', // The db column name
      'label' => "Image", // Table column heading
      'type' => 'Text'
    ]);
    $this->crud->addColumn([
      'name' => 'created_at', // The db column name
      'label' => "created_at", // Table column heading
      'type' => 'Text'
    ]);
    $this->crud->addColumn([
      'name' => 'updated_at', // The db column name
      'label' => "updated_at", // Table column heading
      'type' => 'Text'
    ]);

    //$this->crud->addButtonFromModelFunction('line', 'open', 'getOpenButton', 'beginning');

  
  }

  public function setupCreateOperation()
  {

      //$this->crud->setValidation(TagCrudRequest::class);
// tab gallery
      $this->crud->addField( [
        'tab' => 'Gallery',
        'name' => 'field1',
        'label' => "Field 1",
        'type' => 'select_from_array',
        'options' =>[
        ],
        'allows_null' => false,
        'allows_multiple' => true,

        ////Field gallery Name
        'name' => 'gallery_name',
        'type' => 'text',
        'label' => "Image",

        ///field create__at
        'name'=>'created_at',
        'type'=>'text',
        'label'=>'create_at',



  ]);
  /////Tab gallery detail
      $this->crud->addField([
        'tab' => 'Gallery Detail',
        'name' => 'field2',
        'label' => "field 2",
        'type' => 'select_from_array',
        'options' =>[],
        'allows_null' => false,
        'allows_multiple' => true,



        ////update_at
        'name'=>'updated_at',
        'type'=>'date',
        'label'=>'updated_at',
      ]);
  }

  public function setupUpdateOperation()
  {
      $this->setupCreateOperation();
  }
}