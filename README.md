# Convert text in image to text

## Setup

Make sure to install Tesseract:

```bash
tesseract
sudo apt-get install tesseract-ocr
```

Install Tesseract PHP Wrapper:

```bash
composer require thiagoalessio/tesseract_ocr
```


## Development Server

#Start the development server on `http://localhost:8000`:
```bash
php artisan serve
```

Call the below APi and upload the photo with image parameter
```bash
http://localhost:8000/api/extractUploadImageText
```



