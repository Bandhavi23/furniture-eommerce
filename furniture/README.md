# Furniture Store - Laravel E-commerce Website

A modern, responsive e-commerce website built with Laravel for selling premium furniture. This project is similar to Nilkamal Furniture with full e-commerce functionality.

## 🚀 Features

### Core E-commerce Features
- **Product Management**: Complete product catalog with categories, images, and specifications
- **Shopping Cart**: Session-based cart with add, update, remove, and clear functionality
- **User Authentication**: Registration, login, and user profile management
- **Order Management**: Complete order processing with status tracking
- **Payment Integration**: Support for COD and online payment methods
- **Search & Filter**: Advanced product search and category filtering
- **Responsive Design**: Mobile-first design that works on all devices

### Product Features
- Product categories (Living Room, Bedroom, Dining Room, Office, etc.)
- Product images with gallery support
- Detailed product specifications
- Sale/discount pricing
- Stock management
- Featured products
- Related products

### User Features
- User registration and login
- Order history and tracking
- Profile management
- Wishlist functionality
- Newsletter subscription

### Admin Features
- Product management
- Category management
- Order management
- User management
- Sales reports

## 🛠️ Technology Stack

- **Backend**: Laravel 10.x
- **Frontend**: Bootstrap 5, HTML5, CSS3, JavaScript
- **Database**: MySQL/PostgreSQL
- **Authentication**: Laravel Sanctum
- **Icons**: Font Awesome 6
- **Styling**: Custom CSS with CSS Variables

## 📋 Requirements

- PHP >= 8.1
- Composer
- MySQL/PostgreSQL
- Web server (Apache/Nginx)
- Node.js (for asset compilation)

## 🚀 Installation

### 1. Clone the Repository
```bash
git clone <repository-url>
cd furniture-store
```

### 2. Install Dependencies
```bash
composer install
```

### 3. Environment Setup
```bash
cp env.example .env
```

Edit the `.env` file with your database credentials:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=furniture_store
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 4. Generate Application Key
```bash
php artisan key:generate
```

### 5. Run Database Migrations
```bash
php artisan migrate
```

### 6. Seed the Database
```bash
php artisan db:seed
```

This will create:
- Sample categories (Living Room, Bedroom, Dining Room, etc.)
- Sample products with realistic furniture data
- Admin and test user accounts

### 7. Set Up Storage
```bash
php artisan storage:link
```

### 8. Configure Web Server

#### For Apache:
Create a `.htaccess` file in the public directory:
```apache
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteRule ^(.*)$ public/$1 [L]
</IfModule>
```

#### For Nginx:
```nginx
server {
    listen 80;
    server_name your-domain.com;
    root /path/to/furniture-store/public;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";

    index index.php;

    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.1-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

## 👤 Default Users

After running the seeders, you can login with these accounts:

### Admin User
- Email: `admin@furniturestore.com`
- Password: `password123`

### Test Users
- Email: `john@example.com`
- Password: `password123`

- Email: `jane@example.com`
- Password: `password123`

## 📁 Project Structure

```
furniture-store/
├── app/
│   ├── Http/Controllers/     # Application controllers
│   ├── Models/              # Eloquent models
│   └── ...
├── database/
│   ├── migrations/          # Database migrations
│   └── seeders/            # Database seeders
├── public/
│   ├── css/                # Custom CSS files
│   ├── js/                 # Custom JavaScript files
│   └── images/             # Product images
├── resources/
│   └── views/              # Blade templates
├── routes/
│   └── web.php             # Web routes
└── config/                 # Configuration files
```

## 🎨 Customization

### Styling
- Edit `public/css/style.css` for custom styles
- Modify CSS variables in `:root` for theme colors
- Update Bootstrap classes in views for layout changes

### Adding Products
1. Go to the admin panel (if implemented)
2. Or directly add products to the database
3. Update the `ProductSeeder` for bulk product addition

### Categories
- Modify `CategorySeeder` to add new categories
- Update navigation links in `resources/views/layouts/app.blade.php`

## 🔧 Development

### Running the Application
```bash
php artisan serve
```

The application will be available at `http://localhost:8000`

### Database Commands
```bash
# Run migrations
php artisan migrate

# Rollback migrations
php artisan migrate:rollback

# Refresh database and seed
php artisan migrate:fresh --seed

# Create new migration
php artisan make:migration create_table_name

# Create new seeder
php artisan make:seeder SeederName
```

### Adding New Features
1. Create migration for database changes
2. Update models with new relationships/attributes
3. Create controllers for new functionality
4. Add routes in `routes/web.php`
5. Create views in `resources/views/`
6. Update CSS/JS as needed

## 📱 Features in Detail

### Shopping Cart
- Session-based cart storage
- Add/remove products
- Update quantities
- Cart persistence across sessions
- Cart total calculation

### Product Management
- Product categories and subcategories
- Product images with multiple views
- Detailed specifications
- Price management (regular and sale prices)
- Stock tracking
- SKU management

### Order Processing
- Order creation and management
- Order status tracking
- Email notifications (to be implemented)
- Order history for users
- Invoice generation (to be implemented)

### User Management
- User registration and authentication
- Profile management
- Order history
- Address management
- Password reset functionality

## 🔒 Security Features

- CSRF protection
- SQL injection prevention
- XSS protection
- Input validation and sanitization
- Secure password hashing
- Session security

## 📊 Performance Optimization

- Database indexing
- Image optimization
- CSS/JS minification
- Caching strategies
- Lazy loading for images
- Pagination for large datasets

## 🚀 Deployment

### Production Checklist
- [ ] Set `APP_ENV=production` in `.env`
- [ ] Set `APP_DEBUG=false` in `.env`
- [ ] Configure database for production
- [ ] Set up SSL certificate
- [ ] Configure web server
- [ ] Set up backup system
- [ ] Configure email settings
- [ ] Set up monitoring

### Environment Variables
```env
APP_NAME="Furniture Store"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://your-domain.com

DB_CONNECTION=mysql
DB_HOST=your-db-host
DB_PORT=3306
DB_DATABASE=your-db-name
DB_USERNAME=your-db-user
DB_PASSWORD=your-db-password

MAIL_MAILER=smtp
MAIL_HOST=your-smtp-host
MAIL_PORT=587
MAIL_USERNAME=your-email
MAIL_PASSWORD=your-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=noreply@your-domain.com
MAIL_FROM_NAME="${APP_NAME}"
```

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Add tests if applicable
5. Submit a pull request

## 📄 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## 🆘 Support

For support and questions:
- Create an issue in the repository
- Contact: support@furniturestore.com

## 🔄 Updates

### Version 1.0.0
- Initial release
- Basic e-commerce functionality
- Product catalog
- Shopping cart
- User authentication
- Order management

### Planned Features
- [ ] Admin panel
- [ ] Payment gateway integration
- [ ] Email notifications
- [ ] Advanced search filters
- [ ] Product reviews and ratings
- [ ] Wishlist functionality
- [ ] Multi-language support
- [ ] Mobile app
- [ ] Analytics dashboard

---

**Note**: This is a demonstration project for the Internshala assignment. For production use, additional security measures, testing, and optimization should be implemented. 