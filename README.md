[Product Feed](http://github.com/irfan/productfeed/)

### Description
Used PSR standarts, no more description for now.

File structure:

├── README.md
├── data
├── doc
├── public
│   ├── css
│   │   └── style.css
│   ├── images
│   ├── index.php
│   └── js
│       ├── ajax.js
│       └── productform.js
├── src
│   ├── app
│   │   ├── controller
│   │   │   └── indexController.php
│   │   ├── model
│   │   │   └── productModel.php
│   │   └── view
│   │       ├── JSON.php
│   │       └── index.php
│   ├── bootstrap.php
│   └── lib
│       └── simplemvc
│           ├── ApplicationDispatcher.php
│           ├── Controller.php
│           ├── ControllerAbstract.php
│           ├── ModelAbstract.php
│           ├── Request.php
│           ├── Response.php
│           └── View.php
└── test


### Dependencies
- PHP 5.3
- Any sort of unix system like Linux/BSD or MacOS X

### Installation
Clone the repository, set the public folder as document root to your apache and give product url
