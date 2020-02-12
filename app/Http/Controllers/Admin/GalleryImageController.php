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

      // $this->crud->addField([
      //   'name' => 'gallery_name',
      //   'type' => 'text',
      //   'label' => "Image",
      // ]);

      // $this->crud->addField([
      //   'name'=>'created_at',
      //   'type'=>'date',
      //   'label'=>'create_at',
      // ]);

      // $this->crud->addField([
      //   'name'=>'updated_at',
      //   'type'=>'date',
      //   'label'=>'updated_at',
      // ]);

      $this->crud->addField([   // Address
        'name' => 'file',
        'label' => 'Image',
        'type' => 'browse_multiple',
        // optional
        'store_as_json' => true
    ]);
    // base64_image
$this->crud->addField([
  'label'     => 'MainCategory',
  'type'      => 'checklist',
  'name'      => 'main_category_id',
  'entity'    => 'main_category',
  'attribute' => 'main_category_name',
  'model'     => "App\Models\MainCategory",
  'pivot'     => true,
]);
    // select_from_array
$this->crud->addField([
  'name' => 'select_from_array',
  'label' => "Select from array",
  'type' => 'select_from_array',
  'options' => ['one' => 'One', 'two' => 'Two', 'three' => 'Three'],
  'allows_null' => false,
  'allows_multiple' => true,
  'tab' => 'Tab name here',
]);

$this->crud->addField([   // icon_picker
  'label' => "Icon",
  'name' => 'icon',
  'type' => 'icon_picker',
  'iconset' => 'fontawesome' // options: fontawesome, glyphicon, ionicon, weathericon, mapicon, octicon, typicon, elusiveicon, materialdesign
]);

// image
$this->crud->addField([
  'label' => "Profile Image",
  'name' => "image",
  'type' => 'image',
  'upload' => true,
  'crop' => true, // set to true to allow cropping, false to disable
  'aspect_ratio' => 1, // ommit or set to 0 to allow any aspect ratio
  // 'disk' => 's3_bucket', // in case you need to show images from a different disk
  // 'prefix' => 'uploads/images/profile_pictures/' // in case your db value is only the file name (no path), you can use this to prepend your path to the image src (in HTML), before it's shown to the user;
]);


$this->crud->addField([   // radio
  'name'        => 'status', // the name of the db column
  'label'       => 'Status', // the input label
  'type'        => 'radio',
  'options'     => [
      // the key will be stored in the db, the value will be shown as label; 
      0 => "Draft",
      1 => "Published",
      2 => "Private"
  ],
  // optional
  //'inline'      => false, // show the radios all on the same line?
]);



$this->crud->addField([   // Color
  'name' => 'background_color',
  'label' => 'Background Color',
  'type' => 'color_picker',
  'default' => '#000000',
]);


  }

  public function setupUpdateOperation()
  {
      $this->setupCreateOperation();
  }
}