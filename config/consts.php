<?php
return [
    'no-image' => 'no-image.jpg',
  'navs' => [
      [
          'name' => 'Home',
          'route' => 'home.home',
          'ordering' => 1
      ],
      [
          'name' => 'Products',
          'route' => 'products.index',
          'ordering' => 2
      ],
      [
          'name' => 'About',
          'route' => 'home.about',
          'ordering' => 2
      ],
      [
          'name' => 'Contact',
          'route' => 'home.contact',
          'ordering' => 3
      ],
      [
          'name' => 'Author',
          'route' => 'home.author',
          'ordering' => 4
      ],
  ],

  'colors' => [
      [
          'name' => 'transparent',
          'ordering' => 1
      ],
      [
          'name' => 'red',
          'ordering' => 2
      ],
      [
          'name' => 'black',
          'ordering' => 3
      ],
      [
          'name' => 'blue',
          'ordering' => 4
      ],
      [
          'name' => 'camo',
          'ordering' => 11
      ],
      [
          'name' => 'green',
          'ordering' => 5
      ],
      [
          'name' => 'grey',
          'ordering' => 6
      ],
      [
          'name' => 'multicolor',
          'ordering' => 12
      ],
      [
          'name' => 'floral',
          'ordering' => 13
      ],
      [
          'name' => 'purple',
          'ordering' => 7
      ],
      [
          'name' => 'orange',
          'ordering' => 8
      ],
      [
          'name' => 'yellow',
          'ordering' => 9
      ],
      [
          'name' => 'pink',
          'ordering' => 10
      ],
  ],

  'models' => [
      [
          'name' => 'iPhone 7 Plus',
          'ordering' => 16
      ],
      [
          'name' => 'iPhone 8 Plus',
          'ordering' => 15
      ],
      [
          'name' => 'iPhone XR',
          'ordering' => 14
      ],
      [
          'name' => 'iPhone X',
          'ordering' => 13
      ],
      [
          'name' => 'iPhone XS',
          'ordering' => 12
      ],
      [
          'name' => 'iPhone 11',
          'ordering' => 11
      ],
      [
          'name' => 'iPhone 11 Pro',
          'ordering' => 10
      ],
      [
          'name' => 'iPhone 11 Pro Max',
          'ordering' => 9
      ],
      [
          'name' => 'iPhone 12 Mini',
          'ordering' => 8
      ],
      [
          'name' => 'iPhone 12',
          'ordering' => 7
      ],
      [
          'name' => 'iPhone 12 Pro',
          'ordering' => 6
      ],
      [
          'name' => 'iPhone 12 Pro Max',
          'ordering' => 5
      ],
      [
          'name' => 'iPhone 13 Mini',
          'ordering' => 4
      ],
      [
          'name' => 'iPhone 13',
          'ordering' => 3
      ],
      [
          'name' => 'iPhone 13 Pro',
          'ordering' => 2
      ],
      [
          'name' => 'iPhone 13 Pro Max',
          'ordering' => 1
      ],
  ],

   'categories' => [
       [
           'name' => 'Plastic',
           'value' => 'plastic',
           'ordering' => 3
       ],
       [
           'name' => 'Silicone',
           'value' => 'silicone',
           'ordering' => 4
       ],
       [
           'name' => 'Shine Leather',
           'value' => 'leather',
           'ordering' => 2
       ],
       [
           'name' => 'Anti Static',
           'value' => 'anti-static',
           'ordering' => 1
       ],
       [
           'name' => 'Flip Cover',
           'value' => 'flip',
           'ordering' => 5
       ],

   ],

    'products-select' => [
        [
            'name' => 'Latest',
            'value' => 'date_desc'
        ],
        [
            'name' => 'Oldest',
            'value' => 'date_asc'
        ],
        [
            'name' => 'Price ASC',
            'value' => 'price_asc'
        ],
        [
            'name' => 'Price DESC',
            'value' => 'price_desc'
        ],
    ],

    'per-page-select' => [
        [
            'name' => '9',
            'value' => 9
        ],
        [
            'name' => '18',
            'value' => 18
        ],
        [
            'name' => '27',
            'value' => 27
        ],
        [
            'name' => '54',
            'value' => 54
        ],

    ],

  'contact-info' => [
      'address' => [
          'icon' => 'fa-map-marker',
          'value' => 'Tosin bunar 143'
      ],
      'phone' => [
          'icon' => 'fa-phone',
          'value' => '011/1070123'
      ],
      'email' => [
          'icon' => 'fa-envelope',
          'value' => 'xshop@gmail.com'
      ]
  ],

  'social-info' => [
      'facebook' => [
          'icon' => 'fa-facebook',
          'link' => 'http://facebook.com/'
      ],
      'instagram' => [
          'icon' => 'fa-instagram',
          'link' => 'https://www.instagram.com/'
      ],
      'twitter' => [
          'icon' => 'fa-twitter',
          'link' => 'https://twitter.com/'
      ],
      'linkedin' => [
          'icon' => 'fa-linkedin',
          'link' => 'https://www.linkedin.com/'
      ],
  ],
  'pages' => [
      'home' => [
          'title' => 'Homepage',
          'main-heading' => 'Welcome to Homepage',
          'sub-heading' => 'This is subheading'
      ],
      'contact' => [
          'title' => 'Contact',
          'main-heading' => 'Contact Us',
          'sub-heading' => 'Here You can contact Us',
          'headings' => [
              'services' => [
                  'title' => 'Our Services',
                  'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmo. Lorem ipsum dolor sit amet.'
              ]
          ]
      ],
      'author' => [
          'title' => 'Author',
          'main-heading' => 'Author',
          'sub-heading' => 'Here You can learn more about author of this mf website',
          'headings' => [
              'services' => [
                  'title' => 'Our Services',
                  'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmo. Lorem ipsum dolor sit amet.'
              ]
          ]
      ],
      'about' => [
          'title' => 'About',
          'main-heading' => 'About Us',
          'sub-heading' => 'Here You can learn more about Us',
          'headings' => [
              'services' => [
                  'title' => 'Our Services',
                  'subtitle' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmo. Lorem ipsum dolor sit amet.'
              ],
              'brands' => [
                  'title' => 'Our Brands',
                  'subtitle' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod Lorem ipsum dolor sit amet.'
              ]
          ],
          'carousel' => [
              [
                  'brand_01.png',
                  'brand_02.png',
                  'brand_03.png',
                  'brand_04.png',
              ],[
                  'brand_01.png',
                  'brand_02.png',
                  'brand_03.png',
                  'brand_04.png',
              ],[
                  'brand_01.png',
                  'brand_02.png',
                  'brand_03.png',
                  'brand_04.png',
              ],[
                  'brand_01.png',
                  'brand_02.png',
                  'brand_03.png',
                  'brand_04.png',
              ],
          ],
          'services' => [
              [
                  'icon' => 'fa fa-truck fa-lg',
                  'name' => 'Delivery Services'
              ],
              [
                  'icon' => 'fas fa-exchange-alt',
                  'name' => 'Shipping & Return'
              ],
              [
                  'icon' => 'fa fa-percent',
                  'name' => 'Promotion'
              ],
              [
                  'icon' => 'fa fa-user',
                  'name' => '24 Hours Service'
              ],
          ]
      ],
      'products' => [
          'index' => [
              'title' => 'All products',
              'main-heading' => 'All products',
              'sub-heading' => 'Here you can see all available products',
              'headings' => [
                  'filters' => 'Filters'
              ],
              'filters' => [
                  'categories' => 'Categories',
                  'models' => 'Models',
                  'colors' => 'Colors',
              ]
          ],
          'show' => [
              'title' => "Single product",
              'main-heading' => 'Display single product',
              'sub-heading' => 'Here you can see single product',
              'headings' => [
                  'model' => 'Model',
                  'color' => 'Color',
                  'description' => 'Description',
                  'category' => 'Category'
              ],
          ],
          'edit' => [
              'title' => "Edit Single product",
              'main-heading' => 'Edit single product',
              'sub-heading' => 'Here you can edit single product',
              'headings' => [
                  'model' => 'Model',
                  'color' => 'Color',
                  'description' => 'Description',
                  'category' => 'Category'
              ],
          ],
          'create' => [
              'title' => "Create Single product",
              'main-heading' => 'Create single product',
              'sub-heading' => 'Here you can create single product',
              'headings' => [
                  'model' => 'Model',
                  'color' => 'Color',
                  'description' => 'Description',
                  'category' => 'Category'
              ],
          ],

      ],
      'login' => [
          'title' => 'Login',
          'main-heading' => 'Login page',
          'sub-heading' => 'Have an account? Here You can login',
          'headings' => [

          ],
      ],
      'register' => [
          'title' => 'Register',
          'main-heading' => 'Register page',
          'sub-heading' => "Don't have an account? Here You can register",
          'headings' => [

          ],
      ],
      'cart' => [
          'title' => 'Cart',
          'main-heading' => 'Cart page',
          'sub-heading' => "Here you can see contents of your cart",
          'headings' => [

          ],
      ],
      'orders' => [
          'index' => [
              'title' => 'All orders',
              'main-heading' => 'All orders',
              'sub-heading' => 'Here you can see all orders',
              'headings' => [

              ],
          ],
          'show' => [
              'title' => 'Single order',
              'main-heading' => 'Single order',
              'sub-heading' => 'Here you can see single order',
              'headings' => [

              ],
          ],
      ],
      'customers' => [
          'index' => [
              'title' => 'All customers',
              'main-heading' => 'All customers',
              'sub-heading' => 'Here you can see all customers',
              'headings' => [

              ],
          ],
          'show' => [
              'title' => 'Single customer',
              'main-heading' => 'Single customer',
              'sub-heading' => 'Here you can see single customer',
              'headings' => [

              ],
          ],
      ],
      'filters' => [
          'index' => [
              'title' => 'All filters',
              'main-heading' => 'All filters',
              'sub-heading' => 'Here you can see all filters',
              'headings' => [

              ],
          ],
          'show' => [
              'title' => 'Single filter',
              'main-heading' => 'Single filter',
              'sub-heading' => 'Here you can see single filter',
              'headings' => [

              ],
          ],
      ],
      'activities' => [
          'index' => [
              'title' => 'All activities',
              'main-heading' => 'All activities',
              'sub-heading' => 'Here you can see all activities',
              'headings' => [

              ],
          ],
      ],
      'dashboard' => [
          'index' => [
              'title' => 'Admin Dashboard',
              'main-heading' => 'Welcome back you mfer',
              'sub-heading' => 'Dressed like Gestapo...',
              'headings' => [

              ],
          ],
      ],
  ]
];
