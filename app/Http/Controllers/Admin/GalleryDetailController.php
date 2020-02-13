<?php namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;


class GalleryDetailController extends CrudController {

  use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
  use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
  use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
  use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
  use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
  use \Backpack\CRUD\app\Http\Controllers\Operations\CloneOperation;

  public function setup() 
  {
      $this->crud->setModel("App\Models\GalleryDetail");
      $this->crud->setRoute("admin/gallerydetail");
      $this->crud->setEntityNameStrings('Gallery Detail', 'Gallery Detail');


      $this->crud->enableExportButtons();
  
  }

  public function setupListOperation()
  {
      $columns = [
        
        [
            'label'     => "Name",
            'type'      => 'select',
            'name'      => 'gallery_id', // the db column for the foreign key
            'entity'    => 'gallery', // the method that defines the relationship in your Model
            'attribute' => 'gallery_name', // foreign key attribute that is shown to user
            'model'     => "App\Models\Gallery",
        ],
        [
          'name' => 'image', // The db column name
          'label' => "Image", // Table column heading
          'type' => 'image'
      ],
        [
            'name' => 'created_at', // The db column name
            'label' => "created_at", // Table column heading
            'type' => 'Text'
        ],
        [
            'name' => 'updated_at', // The db column name
            'label' => "updated_at", // Table column heading
            'type' => 'Text'
          ]

      ];

    $this->crud->addColumns($columns);
  }

  public function setupCreateOperation()
  {

    $fields2=[

          [  // Select
            'label' => "Name",
            'type' => 'select2',
            'tab'=>'Gallery Detail',
            'name' => 'gallery_id', // the db column for the foreign key
            'entity' => 'gallery', // the method that defines the relationship in your Model
            'attribute' => 'gallery_name', // foreign key attribute that is shown to user
            'model' => "App\Models\Gallery",
         
            // optional
            'options'   => (function ($query) {
                 return $query->orderBy('gallery_id', 'ASC')->get();
             }), // force the related options to be a custom query, instead of all(); you can use this to filter the results show in the select
            ],
            [
              'tab'=>'Gallery Detail',
              'label' => "Image",
              'name' => "image",
              'filename' => "image_filename", // set to null if not needed
              'type' => 'base64_image',
              'aspect_ratio' => 1, // set to 0 to allow any aspect ratio
              'crop' => true, // set to true to allow cropping, false to disable
              'src' => NULL, // null to read straight from DB, otherwise set to model accessor function
            ],
            [
                'tab'=>'Gallery Detail',
                'name' => 'created_at', // The db column name
                'label' => "created_at", // Table column heading
                'type' => 'date',
      
                'attributes' => [
                  'placeholder' => 'Enter Name',
                  'autocomplete'=>'off',
                  'required'=>'true',
                ],
                'wrapperAttributes' => [
                  'class' => 'form-group col-md-12'
                ],
            ],
            [
                'tab'=>'Gallery Detail',
                'name' => 'updated_at', // The db column name
                'label' => "updated_at", // Table column heading
                'type' => 'date',
      
                'attributes' => [
                  'placeholder' => 'Enter Name',
                  'autocomplete'=>'off',
                  'required'=>'true',
                ],
                'wrapperAttributes' => [
                  'class' => 'form-group col-md-12'
                ],
              ]

  ];

    $this->crud->addFields($fields2);
  }

  public function setupUpdateOperation()
  {
      $this->setupCreateOperation();
  }
}