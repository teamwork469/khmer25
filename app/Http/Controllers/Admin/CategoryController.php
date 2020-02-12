<?php namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;


class CategoryController extends CrudController {

  use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
  use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
  use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
  use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
  use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
  use \Backpack\CRUD\app\Http\Controllers\Operations\CloneOperation;

  public function setup() 
  {
      $this->crud->setModel("App\Models\Category");
      $this->crud->setRoute("admin/category");
      $this->crud->setEntityNameStrings('category', 'category');

      $this->crud->enableExportButtons();
      //$this->crud->setActionsColumnPriority(10000);
      //$this->crud->enableBulkActions();
   
  }

  public function setupListOperation()
  {
    // simple filter
    $this->crud->addFilter([
      'type' => 'text',
      'name' => 'category_name',
      'label'=> 'Category Name'
    ], 
    false, 
    function($value) { // if the filter is active
       $this->crud->addClause('where', 'category_name', 'LIKE', "%$value%");
    });

    // date filter
// $this->crud->addFilter([
//   'type'  => 'date',
//   'name'  => 'created_at',
//   'label' => 'Record Date'
// ],
//   false,
//   function ($value) { // if the filter is active, apply these constraints
//       $this->crud->addClause('where', 'created_at', $value);
//   });

$this->crud->addFilter([
  'type'  => 'date_range',
  'name'  => 'created_at',
  'label' => 'Date range'
],
  false,
  function ($value) { // if the filter is active, apply these constraints
      $dates = json_decode($value);
      $this->crud->addClause('where', 'created_at', '>=', $dates->created_at);
      $this->crud->addClause('where', 'updated_at', '<=', $dates->created_at . ' 23:59:59');
  });




    $this->crud->addColumn([
      'name' => 'category_name', // The db column name
      'label' => "Category", // Table column heading
      'type' => 'Text'
    ]);

    $this->crud->addColumn([
      // 1-n relationship
      'label' => "Main Category",
      'type' => 'select',
      'name' => 'main_category_id', // the db column for the foreign key
      'entity' => 'main_category', // the method that defines the relationship in your Model
      'attribute' => 'main_category_name', // foreign key attribute that is shown to user
      'model' => "App\Models\MainCategory",
 ]);

  
    $this->crud->addColumn([
      'name' => 'description', // The db column name
      'label' => "Description", // Table column heading
      'type' => 'Text'
    ]);

    $this->crud->addColumn([
      'name' => 'created_at', // The db column name
      'label' => "Record Date", // Table column heading
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
        'name' => 'category_name',
        'type' => 'text',
        'label' => "Category",
      ]);

      $this->crud->addField([  // Select
        'label' => "Main Category",
        'type' => 'select2',
        'name' => 'main_category_id', // the db column for the foreign key
        'entity' => 'main_category', // the method that defines the relationship in your Model
        'attribute' => 'main_category_name', // foreign key attribute that is shown to user
        'model' => "App\Models\MainCategory",
     
        // optional
        'options'   => (function ($query) {
             return $query->orderBy('main_category_id', 'ASC')->get();
         }), // force the related options to be a custom query, instead of all(); you can use this to filter the results show in the select
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

  public function setupUpdateOperation()
  {
      $this->setupCreateOperation();
  }
}