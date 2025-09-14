<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MyBlog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" xintegrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>
      <link rel="icon" type="image/png" href="profile.png?v=1">

    
    <style>
        /* Creative Design Styles (Consistent with other pages) */
        body {
            font-family: 'Poppins', sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            /* Static Gradient Background */
            background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
        }

        .glass-form {
            width: 100%;
            max-width: 450px;
            padding: 40px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
        }
        
        .form-title {
            font-weight: 700;
            color: #fff;
            text-shadow: 0 2px 4px rgba(0,0,0,0.2);
            text-align: center;
            margin-bottom: 2rem;
        }

        /* Input Field Design */
        .input-group {
            position: relative;
        }
        
        .form-control {
            background: transparent;
            border: none;
            border-bottom: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 0;
            color: #fff;
            padding-left: 35px; /* Space for the icon */
        }

        .form-control:focus {
            background: transparent;
            color: #fff;
            box-shadow: none;
            border-bottom-color: #fff;
        }
        
        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        /* Input Icons */
        .input-group-icon {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(255, 255, 255, 0.8);
        }

        /* Creative Button */
        .btn-creative {
            font-weight: 600;
            color: #6230df;
            background: #fff;
            border: none;
            padding: 12px 0;
            border-radius: 50px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease-in-out;
            margin-top: 1.5rem;
        }

        .btn-creative:hover {
            color: #fff;
            background: #e73c7e;
            transform: translateY(-3px);
            box-shadow: 0 8px 25px 0 rgba(231, 60, 126, 0.4);
        }
        
        /* Login prompt */
        .login-prompt {
            text-align: center;
            margin-top: 1.5rem;
            color: rgba(255, 255, 255, 0.8);
        }

        .login-prompt a {
            font-weight: bold;
            color: #fff;
            text-decoration: none;
            transition: text-shadow 0.2s;
        }

        .login-prompt a:hover {
            text-decoration: underline;
            text-shadow: 0 0 5px #fff;
        }
    </style>
</head>
<body>
    
    <div class="container text-center">
        
        <form class="glass-form mx-auto" action="php/signup.php" method="post">

            <h1 class="form-title">Create Account</h1>
            
            <?php if(isset($_GET['error'])){ ?>
            <div class="alert alert-danger" role="alert">
              <?php echo htmlspecialchars($_GET['error']); ?>
            </div>
            <?php } ?>

            <?php if(isset($_GET['success'])){ ?>
            <div class="alert alert-success" role="alert">
              <?php echo htmlspecialchars($_GET['success']); ?>
            </div>
            <?php } ?>

          <div class="mb-4">
            <div class="input-group">
                <i class="fas fa-user input-group-icon"></i>
                <input type="text" 
                       class="form-control"
                       name="fname"
                       placeholder="Full Name"
                       value="<?php echo (isset($_GET['fname']))? htmlspecialchars($_GET['fname']):"" ?>">
            </div>
          </div>

          <div class="mb-4">
            <div class="input-group">
                <i class="fas fa-user-tag input-group-icon"></i>
                <input type="text" 
                       class="form-control"
                       name="uname"
                       placeholder="Username"
                       value="<?php echo (isset($_GET['uname']))? htmlspecialchars($_GET['uname']):"" ?>">
            </div>
          </div>

          <div class="mb-4">
            <div class="input-group">
                <i class="fas fa-lock input-group-icon"></i>
                <input type="password" 
                       class="form-control"
                       name="pass"
                       placeholder="Password">
            </div>
          </div>
          
          <button type="submit" class="btn w-100 btn-creative">
            Sign Up
          </button>

          <div class="login-prompt">
            Already have an account? <a href="login.php">Login</a>
          </div>
        </form>
        
    </div>
</body>
</html>

