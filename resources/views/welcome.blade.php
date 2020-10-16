
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Online Articles</title>

    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <style>
      body {
        padding-top: 5rem;
      }
      body.guest nav#nav-main li.nav-item.authenticated {
        display: none;
      }
      body.authenticated nav#nav-main li.nav-item.guest {
        display: none;
      }
      body.guest table#table-articles {
        display: none;
      }
      body.authenticated table#table-articles {
        display: table;
      }
    </style>
  </head>
  <body class="guest">
    <!-- Login Modal -->
    <div class="modal fade" id="modal-login" tabindex="-1" role="dialog" aria-labelledby="label-modal-login" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="label-modal-login">Login</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="login-email">Your email</label>
              <input type="email" id="login-email" class="form-control">
            </div>
            <div class="form-group">
              <label for="login-password">Your password</label>
              <input type="password" id="login-password" class="form-control">
            </div>
          </div>
          <div class="modal-footer">
            <button id="login-btn" class="btn btn-primary">Login</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Register Modal -->
    <div class="modal fade" id="modal-register" tabindex="-1" role="dialog" aria-labelledby="label-modal-register" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="label-modal-register">Register</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="register-name">Your name</label>
              <input type="text" id="register-name" class="form-control">
            </div>
            <div class="form-group">
              <label for="register-email">Your email</label>
              <input type="email" id="register-email" class="form-control">
            </div>
            <div class="form-group">
              <label for="register-password">Your password</label>
              <input type="password" id="register-password" class="form-control">
            </div>
          </div>
          <div class="modal-footer">
            <button id="register-btn" class="btn btn-primary">Register</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Logout Modal -->
    <div class="modal fade" id="modal-logout" tabindex="-1" role="dialog" aria-labelledby="label-modal-logout" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="label-modal-logout">Logout</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Are you sure that you want to logout?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="button" id="logout-btn" class="btn btn-primary">Logout</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Navigation Bar -->
    <nav id="nav-main" class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="#">Online Articles</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
        </ul>
        <ul class="navbar-nav my-2 my-lg-0">
          <li class="nav-item guest">
            <a href="" class="nav-link" data-toggle="modal" data-target="#modal-login">Login</a>
          </li>
          <li class="nav-item guest">
            <a href="" class="nav-link" data-toggle="modal" data-target="#modal-register">Register</a>
          </li>
          <li class="nav-item authenticated">
            <a href="" class="nav-link" data-toggle="modal" data-target="#modal-logout">Logout</a>
          </li>
        </ul>
      </div>
    </nav>

    <main role="main" class="container">

      <div class="articles">
        <h1>Articles</h1>
        <table id="table-articles">
          <thead>
            <tr>
              <th>Title</th><th>Body</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>

      <template id="template-row-article">
        <tr class="row-article">
          <td class="cell-title"></td>
          <td class="cell-body"></td>
        </tr>
      </template>

    </main><!-- /.container -->
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/articles.js"></script>
  </body>
</html>
