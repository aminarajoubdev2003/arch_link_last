
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;500&display=swap" rel="stylesheet" />
    <style>
      * { margin: 0px; padding: 0px; box-sizing: border-box; }
      body { font-family: "Open Sans", sans-serif; margin: 0; }
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
        background-image: url("{{ asset('imgs/bg.jpg') }}");
        background-size: cover;
        background-repeat: no-repeat;
      }
      .sign {
        padding: 40px 32px;
        width: 500px;
        min-height: 435px;
        border-radius: 16px;
        background-color: white;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
      }
      .sign .title { text-align: center; }
      .sign .title h1 { font-size: 32px; margin-bottom: 8px; }
      .sign .title p { font-size: 18px; }
      .sign form label { margin-bottom: 4px; }
      .sign form > div { display: flex; flex-direction: column; }
      .sign form input {
        padding: 13px 17px;
        height: 45px;
        border-radius: 6px;
        background-color: #f1f4f9;
        border: 1px solid #d8d8d8;
      }
      .sign .btn {
        height: auto;
        padding: 13px;
        margin-bottom: 8px;
        width: 100%;
        color: white;
        font-weight: 700;
        border-radius: 8px;
        cursor: pointer;
        border: none;
        background-color: var(--blue-alt-color);
      }
      .sign.signin { position: relative; }
      .sign.signin form > div { margin-bottom: 25px; }
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
        .auth { padding: 20px; }
        .sign.signin { height: 500px; }
      }
      @media (max-width: 550px) {
        .sign { width: 100%; }
        .sign.signup form { display: flex; flex-direction: column; }
      }
      .text { text-align: center; }
      .text h1 { margin-bottom: 5px; font-size: 36px; }
      .text p { color: #888; }
    </style>
  </head>
  <body>
    <div class="auth">
      <div class="sign signin">
        <div class="title">
          <img style="width: 150px" src="{{ asset('imgs/error1.png') }}" alt="" />
        </div>
        <div class="text">
          <h1>{{ $errors }}</h1>
          <p>An unexpected error occurred. Please try again in a few moments.</p>
        </div>
        <button class="btn">Retry</button>
      </div>
    </div>
  </body>
</html>
