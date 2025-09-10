<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/all.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;500&display=swap"
      rel="stylesheet"
    />
    <style>
      * {
        margin: 0px;
        padding: 0px;
        box-sizing: border-box;
      }
      body {
        font-family: "Open Sans", sans-serif;
        margin: 0;
      }
      :root {
        --blue-color: #1d322fb2;
        --blue-alt-color: #385854;
        --orange-color: #f59e0b;
        --green-color: #22c55e;
        --red-color: #b3261e;
        --grey-color: #888;
      }
      .auth {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width: 100%;
        min-height: 100vh;
        background-color: var(--blue-alt-color);
        background-image: url("../imgs/bg.jpg");
        background-size: cover;
        background-repeat: no-repeat;
      }
      .sign {
        padding: 25px 32px;
        width: 500px;
        min-height: 435px;
        border-radius: 16px;
        background-color: white;
      }
      .sign .title {
        text-align: center;
        margin-bottom: 40px;
      }
      .sign .title h1 {
        font-size: 32px;
        margin-bottom: 8px;
      }
      .sign .title p {
        font-size: 18px;
      }
      .sign form label {
        margin-bottom: 4px;
      }
      .sign form > div {
        display: flex;
        flex-direction: column;
      }
      .sign form input {
        padding: 13px 17px;
        height: 45px;
        border-radius: 6px;
        background-color: #f1f4f9;
        border: 1px solid #d8d8d8;
      }
      .sign form input[type="submit"],
      .sign form .btn {
        margin-top: 15px;
        height: auto;
        padding: 13px;
        margin-bottom: 8px;
        width: 100%;
        color: white;
        font-weight: 700;
        border-radius: 8px;
        cursor: pointer;
        background-color: var(--blue-alt-color);
      }
      .sign .auth-footer {
        text-align: center;
        color: #202224;
        font-size: 14px;
      }
      .sign .auth-footer a {
        margin-left: 2px;
        color: #5a8cff;
      }
      /* sign up only*/
      .sign.signup form {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 16px 19px;
      }
      .sign.signup form > div.email,
      .sign.signup form > div.submit {
        grid-column: span 2;
      }
      .sign.signup form .profile-image input {
        width: 100px;
        height: 100px;
        position: absolute;
        opacity: 0;
      }
      .sign.signup form .upload {
        margin-bottom: 5px;
        width: 100px;
        height: 100px;
        display: flex;
        justify-content: center;
        align-items: center;
        border: 2px dashed #4880ff4d;
      }
      /* sign in only */
      .sign.signin {
        position: relative;
      }
      .sign.signin form > div {
        margin-bottom: 25px;
      }
      .sign.signin form .auth-footer {
        padding: 0px 32px;
        position: absolute;
        width: 100%;
        bottom: 25px;
        left: 0;
        display: block;
      }
      .sign.signin form .auth-footer .submit input {
        width: calc(100% - 64px);
      }
      @media (max-width: 768px) {
        .auth {
          padding: 20px;
        }
        .sign.signin {
          height: 500px;
        }
      }
      @media (max-width: 550px) {
        .sign {
          width: 100%;
        }
        .sign.signup form {
          display: flex;
          flex-direction: column;
        }
      }
    </style>
  </head>
  <body>
    <div class="auth">
      <div class="sign signin">
        <div class="title">
          <h1>
            SignIn To
            <img
              style="width: 45px; vertical-align: text-top"
              src="../imgs/logo.png"
              alt=""
            /><span>ArchiLink Dashboard</span>
          </h1>
          <p>Please enter your email and password to continue</p>
        </div>
        <form method="POST" action="###">
            @csrf
          <div class="email">
            <label for="email">Email</label>
            <input type="email" placeholder="Email" id="email" name="email" />
          </div>
          <div class="password">
            <label htmlFor="password">Password</label>
            <input
              type="password"
              placeholder="********"
              id="password"
              name="password"
            />
          </div>
          <input type="submit" value="Sign In" />
          <!-- <span>ArchiLink </span> -->
        </form>
      </div>
    </div>
  </body>
</html>
