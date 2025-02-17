## Personal Financial Control


![maintenance-status](https://img.shields.io/badge/maintenance-actively--developed-brightgreen.svg)

## Project Description
     This is a Personal Financial Control application 
     

## Technologies Used in the Project
     
### Laravel
![Laravel](https://img.shields.io/badge/laravel-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white)

### MySQL
![MySQL](https://img.shields.io/badge/mysql-4479A1.svg?style=for-the-badge&logo=mysql&logoColor=white)

### Requirements
## NodeJs

## Instructions for Executing the Project

### Step 1 – Clone the project, open `vscode` and then open a new terminal in `Terminal > New Terminal` and run the code below in the terminal
```bash
git clone https://github.com/fernandooliveiralima/FinancialControl-BackEnd-Laravel.git 
```
### Step 2 - Access the Project Folder Run the code below in the `vscode` terminal
```bash
cd FinancialControl-BackEnd-Laravel 
```

### Step 3 - In the `vscode` Terminal, run the code below
```bash
composer install 
```
## Step 3 – rename `.env.example file` to `.env`
### step 3.1 in the `DB_PASSWORD` field insert the database name: `auth_sanctum`, then create the `auth_sanctum` database

### Step 4 - In the `vscode` Terminal, run the code below
```bash
php artisan migrate
```
### Step 5 - In the `vscode` Terminal, run the code below
```bash
php artisan key:generate
```
### Step 6 - In the `vscode` Terminal, run the code below
```bash
php artisan serve
```

## After that, the application will open in your browser.



