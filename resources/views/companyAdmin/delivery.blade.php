<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;500&display=swap"
      rel="stylesheet"
    />
    <style>
      /* fontawesome icons*/
      /* framework.css */
      :root {
        --blue-color: #0075ff;
        --blue-alt-color: #0d69d5;
        --orange-color: #f59e0b;
        --green-color: #22c55e;
        --red-color: #f44336;
        --grey-color: #888;
      }
      /* Start Box */
      .d-flex {
        display: flex;
      }
      .f-wrap {
        flex-wrap: wrap;
      }
      .align-center {
        align-items: center;
      }
      .space-between {
        justify-content: space-between;
      }
      .d-grid {
        display: grid;
      }
      .gap-20 {
        gap: 20px;
      }
      .d-block {
        display: block;
      }
      @media (max-width: 767px) {
        .block-mobile {
          display: block;
        }
        .hide-mobile {
          display: none;
        }
      }
      /* End Box */
      /* Start Padding + Margin */
      .p-10 {
        padding: 10px;
      }
      .p-15 {
        padding: 15px;
      }
      .p-20 {
        padding: 20px;
      }
      .pt-10 {
        padding-top: 10px;
      }
      .pt-15 {
        padding-top: 15px;
      }
      .pt-20 {
        padding-top: 20px;
      }
      .pb-10 {
        padding-bottom: 10px;
      }
      .pb-15 {
        padding-bottom: 15px;
      }
      .pb-20 {
        padding-bottom: 20px;
      }
      .pl-15 {
        padding-left: 15px;
      }
      .m-0 {
        margin: 0;
      }
      .m-15 {
        margin: 15px;
      }
      .m-20 {
        margin: 20px;
      }
      .mt-0 {
        margin-top: 0;
      }
      .mt-5 {
        margin-top: 5px;
      }
      .mt-10 {
        margin-top: 10px;
      }
      .mt-15 {
        margin-top: 15px;
      }
      .mt-20 {
        margin-top: 20px;
      }
      .mt-25 {
        margin-top: 25px;
      }
      .mr-10 {
        margin-right: 10px;
      }
      .mr-15 {
        margin-right: 15px;
      }
      .mb-5 {
        margin-bottom: 5px;
      }
      .mb-10 {
        margin-bottom: 10px;
      }
      .mb-15 {
        margin-bottom: 15px;
      }
      .mb-20 {
        margin-bottom: 20px;
      }
      .mb-25 {
        margin-bottom: 25px;
      }
      /* End Padding + Margin */
      /* Start Color */
      .c-black {
        color: black;
      }
      .c-white {
        color: white;
      }
      .c-grey {
        color: var(--grey-color);
      }
      .c-red {
        color: var(--red-color);
      }
      .c-green {
        color: var(--green-color);
      }
      .c-blue {
        color: var(--blue-color);
      }
      .c-orange {
        color: var(--orange-color);
      }
      .bg-red {
        background-color: var(--red-color);
      }
      .bg-green {
        background-color: var(--green-color);
      }
      .bg-blue {
        background-color: var(--blue-color);
      }
      .bg-orange {
        background-color: var(--orange-color);
      }
      .bg-white {
        background-color: white;
      }
      .bg-eee {
        background-color: #eee;
      }
      /* End Color */
      /* Start Position */
      .p-relative {
        position: relative;
      }
      .p-absolute {
        position: absolute;
      }
      /* End Position */
      /* Start Font */
      .txt-c {
        text-align: center;
      }
      .fs-13 {
        font-size: 13px;
      }
      .fs-14 {
        font-size: 14px;
      }
      .fs-15 {
        font-size: 15px;
      }
      .fs-25 {
        font-size: 25px;
      }
      .fw-bold {
        font-weight: bold;
      }
      @media (max-width: 767px) {
        .txt-c-mobile {
          text-align: center;
        }
      }
      /* End Font */
      /* Start Border */
      .rad-6 {
        border-radius: 6px;
      }
      .rad-10 {
        border-radius: 10px;
      }
      .rad-half {
        border-radius: 50%;
      }
      .b-none {
        border: none;
      }
      .border-ccc {
        border: 1px solid #ccc;
      }
      .border-eee {
        border: 1px solid #eee;
      }

      /* End Border */
      /* Start Width + Height */
      .w-full {
        width: 100%;
      }
      .w-100 {
        width: 100px;
      }
      .w-fit {
        width: fit-content;
      }
      .h-full {
        height: 100%;
      }
      .h-100 {
        height: 100px;
      }
      /* End Width + Height */
      /* Start Components */
      .center-flex {
        display: flex;
        align-items: center;
        justify-content: center;
      }
      .between-flex {
        display: flex;
        align-items: center;
        justify-content: space-between;
      }
      .btn-shape {
        padding: 4px 10px;
        border-radius: 6px;
      }
      /* End Components */
      /* master css */
      :root {
        --blue-color: #1d322fb2;
        --blue-alt-color: #385854;
        --orange-color: #f59e0b;
        --green-color: #22c55e;
        --red-color: #b3261e;
        --grey-color: #888;
      }
      /* :root {
  --primary-color: #1d322f;
  --secondary-color: #1d322fb2;
  --third-color: #385854;
  --nutral-color: #c0c0c0;
  --text-color: #000e0c;
  --error-color: #b3261e;
} */
      * {
        box-sizing: border-box;
      }
      body {
        font-family: "Open Sans", sans-serif;
        margin: 0;
      }
      *:focus {
        outline: none;
      }
      a {
        text-decoration: none;
      }
      ul {
        list-style: none;
        padding: 0;
      }
      ::-webkit-scrollbar {
        width: 15px;
      }
      ::-webkit-scrollbar-track {
        background-color: white;
      }
      ::-webkit-scrollbar-thumb {
        background-color: var(--blue-color);
      }
      ::-webkit-scrollbar-thumb:hover {
        background-color: var(--blue-alt-color);
      }
      .page {
        background-color: #f1f5f9;
        min-height: 100vh;
      }
      /* Start Sidebar */
      .sidebar {
        position: relative;
        width: 250px;
        box-shadow: 0 0 10px #ddd;
        ul {
          display: flex;
          flex-direction: column;
          gap: 5px;
        }
      }
      .sidebar > .holder {
        position: fixed;
        width: 179px;
        height: 100vh;
      }
      @media (max-width: 991px) {
        .sidebar > .holder {
          position: fixed;
          width: 165px;
        }
      }
      @media (max-width: 991px) {
        .sidebar > .holder {
          position: fixed;
          width: 32px;
        }
      }
      .sidebar .logo-holder h3 {
        margin: 0px;
      }
      .sidebar .logo-holder {
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 50px;
      }
      .sidebar .logo-holder img {
        object-fit: cover;
      }
      .sidebar .logo-holder::before,
      .sidebar .logo-holder::after {
        content: "";
        background-color: black;
        transform: translateX(-50%);
        position: absolute;
        left: 50%;
      }
      .sidebar .logo-holder::before {
        width: 75%;
        height: 2px;
        bottom: -20px;
      }
      .sidebar .logo-holder::after {
        bottom: -29px;
        width: 12px;
        height: 12px;
        border-radius: 50%;
        border: 4px solid white;
      }
      .sidebar ul li a {
        transition: 0.3s;
        margin-bottom: 5px;
      }
      .sidebar ul li a:hover,
      .sidebar ul li .active {
        color: var(--blue-color);
        background-color: #c0c0c04d;
      }
      .sidebar ul li a span {
        font-size: 14px;
        margin-left: 10px;
      }
      @media (max-width: 767px) {
        .sidebar {
          width: 58px;
          padding: 10px;
        }
        .sidebar .logo-holder {
          margin-bottom: 15px;
        }
        .sidebar .logo-holder h3 {
          font-size: 12px;
        }
        .sidebar .logo-holder img {
          display: none;
        }
        .sidebar .logo-holder::before,
        .sidebar .logo-holder::after {
          display: none;
        }
        .accordion-list {
          padding-left: 0px !important;
        }
        .sidebar ul li a span,
        .sidebar ul li span {
          display: none;
        }
      }
      /* End Sidebar */
      /* Start Content */
      .page > .content {
        overflow: hidden;
        background-color: #c0c0c033;
      }
      .head .search::before {
        font-family: var(--fa-style-family-classic);
        content: "\f002";
        font-weight: 900;
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 14px;
        color: var(--grey-color);
      }
      .head .search input {
        border: 1px solid #ccc;
        border-radius: 10px;
        margin-left: 5px;
        padding-left: 30px;
        width: 160px;
        transition: width 0.3s;
      }
      .head .search input:focus {
        width: 200px;
      }
      .head .search input:focus::placeholder {
        opacity: 0;
      }
      .head .icons .notification::before {
        content: "";
        position: absolute;
        width: 10px;
        height: 10px;
        background-color: var(--red-color);
        border-radius: 50%;
        right: -5px;
        top: -5px;
      }
      .head .icons img {
        width: 32px;
        height: 32px;
        margin-left: 15px;
      }
      .page h1 {
        margin: 20px 20px 40px;
      }
      .page h1::before,
      .page h1::after {
        content: "";
        height: 3px;
        position: absolute;
        bottom: -10px;
        left: 0;
      }
      .page h1::before {
        background-color: white;
        width: 120px;
      }
      .page h1::after {
        background-color: black;
        width: 40px;
      }
      .wrapper {
        grid-template-columns: repeat(auto-fill, minmax(450px, 1fr));
        margin-left: 20px;
        margin-right: 20px;
        margin-bottom: 20px;
      }
      @media (max-width: 767px) {
        .wrapper {
          grid-template-columns: minmax(200px, 1fr);
          margin-left: 10px;
          margin-right: 10px;
          gap: 10px;
        }
      }
      /* End Content */
      /* Start Welcome Widget */
      .welcome {
        overflow: hidden;
      }
      .welcome .intro img {
        width: 200px;
        margin-bottom: -10px;
      }
      .welcome .avatar {
        width: 64px;
        height: 64px;
        border: 2px solid white;
        border-radius: 50%;
        padding: 2px;
        box-shadow: 0 0 5px #ddd;
        margin-left: 20px;
        margin-top: -32px;
      }
      .welcome .body {
        border-top: 1px solid #eee;
        border-bottom: 1px solid #eee;
      }
      .welcome .body > div {
        flex: 1;
      }
      .welcome .visit {
        margin: 0 15px 15px auto;
        transition: 0.3s;
      }
      .welcome .visit:hover {
        background-color: var(--blue-alt-color);
      }
      @media (max-width: 767px) {
        .welcome .intro {
          padding-bottom: 30px;
        }
        .welcome .avatar {
          margin-left: 0;
        }
        .welcome .body > div:not(:last-child) {
          margin-bottom: 20px;
        }
      }
      /* End Welcome Widget */
      /* Start Quick Draft Widget */
      .quick-draft textarea {
        resize: none;
        min-height: 180px;
      }
      .quick-draft .save {
        margin-left: auto;
        transition: 0.3s;
        cursor: pointer;
      }
      .quick-draft .save:hover {
        background-color: var(--blue-alt-color);
      }
      /* End Quick Draft Widget */
      /* Start Targets */
      .targets .target-row .icon {
        width: 80px;
        height: 80px;
        margin-right: 15px;
      }
      .targets .details {
        flex: 1;
      }
      .targets .details .progress {
        height: 4px;
      }
      .targets .details .progress > span {
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
      }
      .targets .details .progress > span span {
        position: absolute;
        bottom: 16px;
        right: -16px;
        color: white;
        padding: 2px 5px;
        border-radius: 6px;
        font-size: 13px;
      }
      .targets .details .progress > span span::after {
        content: "";
        border-color: transparent;
        border-width: 5px;
        border-style: solid;
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
      }
      .targets .details .progress > .blue span::after {
        border-top-color: var(--blue-color);
      }
      .targets .details .progress > .orange span::after {
        border-top-color: var(--orange-color);
      }
      .targets .details .progress > .green span::after {
        border-top-color: var(--green-color);
      }
      .blue .icon,
      .blue .progress {
        background-color: rgb(0 117 255 / 20%);
      }
      .orange .icon,
      .orange .progress {
        background-color: rgb(245 158 11 / 20%);
      }
      .green .icon,
      .green .progress {
        background-color: rgb(34 197 94 / 20%);
      }
      /* End Targets */
      /* Start Tickets */
      .tickets .box {
        border: 1px solid #ccc;
        width: calc(50% - 10px);
      }
      @media (max-width: 767px) {
        .tickets .box {
          width: 100%;
        }
      }
      /* End Tickets */
      /* Start Latest News */
      .latest-news .news-row:not(:last-of-type) {
        margin-bottom: 20px;
        padding-bottom: 20px;
        border-bottom: 1px solid #eee;
      }
      .latest-news .news-row img {
        width: 100px;
        border-radius: 6px;
        margin-right: 15px;
      }
      .latest-news .info {
        flex-grow: 1;
      }
      .latest-news .info h3 {
        margin: 0 0 6px;
        font-size: 16px;
      }
      @media (max-width: 767px) {
        .latest-news .news-row {
          display: block;
        }
        .latest-news .news-row .label {
          margin: 10px auto;
          width: fit-content;
        }
      }
      /* End Latest News */
      /* Start Tasks */
      .tasks .task-row:not(:last-of-type) {
        margin-bottom: 15px;
        padding-bottom: 15px;
        border-bottom: 1px solid #eee;
      }
      .tasks .info {
        flex-grow: 1;
      }
      .tasks .done {
        opacity: 0.3;
      }
      .tasks .done h3,
      .tasks .done p {
        text-decoration: line-through;
      }
      .tasks .delete {
        cursor: pointer;
        transition: 0.3s;
      }
      .tasks .delete:hover {
        color: var(--red-color);
      }
      /* End Tasks */
      /* Start Latest Uploads */
      .latest-uploads ul li:not(:last-child) {
        border-bottom: 1px solid #eee;
      }
      .latest-uploads ul li img {
        width: 40px;
        height: 40px;
      }
      /* End Latest Uploads */
      /* Start Last Project */
      .last-project ul::before {
        content: "";
        position: absolute;
        left: 11px;
        width: 2px;
        height: 100%;
        background-color: var(--blue-color);
      }
      .last-project ul li::before {
        content: "";
        width: 20px;
        height: 20px;
        display: block;
        border-radius: 50%;
        background-color: white;
        border: 2px solid white;
        outline: 2px solid var(--blue-color);
        margin-right: 15px;
        z-index: 1;
      }
      .last-project ul li.done::before {
        background-color: var(--blue-color);
      }
      .last-project ul li.current::before {
        animation: change-color 0.8s infinite alternate;
      }
      .last-project .launch-icon {
        position: absolute;
        width: 160px;
        right: 0;
        bottom: 0;
        opacity: 0.1;
      }
      /* End Last Project */
      /* Start Reminders */
      .reminders ul li .key {
        width: 15px;
        height: 15px;
      }
      .reminders ul li > .blue {
        border-left: 2px solid var(--blue-color);
      }
      .reminders ul li > .green {
        border-left: 2px solid var(--green-color);
      }
      .reminders ul li > .orange {
        border-left: 2px solid var(--orange-color);
      }
      .reminders ul li > .red {
        border-left: 2px solid var(--red-color);
      }
      /* End Reminders */
      /* Start Latest Post */
      .latest-post .avatar {
        width: 48px;
        height: 48px;
      }
      .latest-post .post-content {
        text-transform: capitalize;
        line-height: 1.8;
        border-top: 1px solid #eee;
        border-bottom: 1px solid #eee;
        min-height: 140px;
      }
      /* End Latest Post */
      /* Start Social Media */
      .social-media .box {
        padding-left: 70px;
      }
      .social-media .box i {
        position: absolute;
        left: 0;
        top: 0;
        width: 52px;
        transition: 0.3s;
      }
      .social-media .box i:hover {
        transform: rotate(5deg);
      }
      .social-media .twitter {
        background-color: rgb(29 161 242 / 20%);
        color: #1da1f2;
      }
      .social-media .twitter i,
      .social-media .twitter a {
        background-color: #1da1f2;
      }
      .social-media .facebook {
        background-color: rgb(24 119 242 / 20%);
        color: #1da1f2;
      }
      .social-media .facebook i,
      .social-media .facebook a {
        background-color: #1877f2;
      }
      .social-media .youtube {
        background-color: rgb(255 0 0 / 20%);
        color: #ff0000;
      }
      .social-media .youtube i,
      .social-media .youtube a {
        background-color: #ff0000;
      }
      .social-media .linkedin {
        background-color: rgb(0 119 181 / 20%);
        color: #0077b5;
      }
      .social-media .linkedin i,
      .social-media .linkedin a {
        background-color: #0077b5;
      }
      /* End Social Media */
      /* Start Projects Table */
      .projects .responsive-table {
        overflow-x: auto;
      }
      .projects table {
        min-width: 1000px;
        border-spacing: 0;
      }
      .projects thead td {
        background-color: #eee;
        font-weight: bold;
      }
      .projects table td {
        padding: 15px;
      }
      .projects tbody td {
        border-bottom: 1px solid #eee;
        border-left: 1px solid #eee;
        transition: 0.3s;
      }
      .projects table tbody tr td:last-child {
        border-right: 1px solid #eee;
      }
      .projects tbody tr:hover td {
        background-color: #faf7f7;
      }
      .projects table img {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        padding: 2px;
        background-color: white;
      }
      .projects table img:not(:first-child) {
        margin-left: -20px;
      }
      .projects table .label {
        font-size: 13px;
      }
      /* End Projects Table */
      /* Start Settings */
      .settings-page {
        grid-template-columns: repeat(auto-fill, minmax(500px, 1fr));
      }
      @media (max-width: 767px) {
        .settings-page {
          grid-template-columns: minmax(100px, 1fr);
          margin-left: 10px;
          margin-right: 10px;
          gap: 10px;
        }
      }
      .settings-page .close-message {
        border: 1px solid #ccc;
        resize: none;
        min-height: 150px;
      }
      .settings-page .email {
        display: inline-flex;
        width: calc(100% - 80px);
      }
      .settings-page .sec-box {
        padding-bottom: 15px;
      }
      .settings-page .sec-box:not(:last-of-type) {
        border-bottom: 1px solid #eee;
      }
      .settings-page .sec-box .button {
        transition: 0.3s;
      }
      .settings-page .sec-box .button:hover {
        background-color: var(--blue-alt-color);
      }
      .settings-page .social-boxes i {
        width: 40px;
        height: 40px;
        background-color: #f6f6f6;
        border: 1px solid #ddd;
        border-right: none;
        border-radius: 6px 0 0 6px;
        transition: 0.3s;
      }
      .settings-page .social-boxes input {
        height: 40px;
        background-color: #f6f6f6;
        border: 1px solid #ddd;
        padding-left: 10px;
        border-radius: 0 6px 6px 0;
      }
      .settings-page .social-boxes > div:focus-within i {
        color: black;
      }
      .widgets-control .control input[type="checkbox"] {
        -webkit-appearance: none;
        appearance: none;
      }
      .widgets-control .control label {
        padding-left: 30px;
        cursor: pointer;
        position: relative;
      }
      .widgets-control .control label::before,
      .widgets-control .control label::after {
        position: absolute;
        left: 0;
        top: 50%;
        margin-top: -9px;
        border-radius: 4px;
      }
      .widgets-control .control label::before {
        content: "";
        width: 14px;
        height: 14px;
        border: 2px solid var(--grey-color);
      }
      .widgets-control .control label:hover::before {
        border-color: var(--blue-alt-color);
      }
      .widgets-control .control label::after {
        font-family: var(--fa-style-family-classic);
        content: "\f00c";
        font-weight: 900;
        background-color: var(--blue-color);
        color: white;
        font-size: 12px;
        width: 18px;
        height: 18px;
        display: flex;
        justify-content: center;
        align-items: center;
        transform: scale(0) rotate(360deg);
        transition: 0.3s;
      }
      .widgets-control .control input[type="checkbox"]:checked + label::after {
        transform: scale(1);
      }
      .backup-control input[type="radio"] {
        -webkit-appearance: none;
        appearance: none;
      }
      .backup-control .date label {
        padding-left: 30px;
        cursor: pointer;
        position: relative;
      }
      .backup-control .date label::before {
        content: "";
        position: absolute;
        top: 50%;
        left: 0;
        margin-top: -11px;
        width: 18px;
        height: 18px;
        border: 2px solid var(--grey-color);
        border-radius: 50%;
      }
      .backup-control .date label::after {
        content: "";
        position: absolute;
        left: 5px;
        top: 5px;
        width: 12px;
        height: 12px;
        background: var(--blue-color);
        border-radius: 50%;
        transition: 0.3s;
        transform: scale(0);
      }
      .backup-control .date input[type="radio"]:checked + label::before {
        border-color: var(--blue-color);
      }
      .backup-control .date input[type="radio"]:checked + label::after {
        transform: scale(1);
      }
      .backup-control .servers {
        border-top: 1px solid #eee;
        padding-top: 20px;
      }
      @media (max-width: 767px) {
        .backup-control .servers {
          flex-wrap: wrap;
        }
      }
      .backup-control .servers .server {
        border: 2px solid #eee;
        position: relative;
      }
      .backup-control .servers .server label {
        cursor: pointer;
      }
      .backup-control .servers input[type="radio"]:checked + .server {
        border-color: var(--blue-color);
        color: var(--blue-color);
      }
      .toggle-checkbox {
        -webkit-appearance: none;
        appearance: none;
        display: none;
      }
      .toggle-switch {
        background-color: #ccc;
        width: 78px;
        height: 32px;
        border-radius: 16px;
        position: relative;
        transition: 0.3s;
        cursor: pointer;
      }
      .toggle-switch::before {
        font-family: var(--fa-style-family-classic);
        content: "\f00d";
        font-weight: 900;
        background-color: white;
        width: 24px;
        height: 24px;
        position: absolute;
        border-radius: 50%;
        top: 4px;
        left: 4px;
        display: flex;
        justify-content: center;
        align-items: center;
        color: #aaa;
        transition: 0.3s;
      }
      .toggle-checkbox:checked + .toggle-switch {
        background-color: var(--blue-color);
      }
      .toggle-checkbox:checked + .toggle-switch::before {
        content: "\f00c";
        left: 50px;
        color: var(--blue-color);
      }
      .settings-page :disabled {
        cursor: no-drop;
        background-color: #f0f4f8;
        color: #bbb;
      }
      /* End Settings */
      /* Start Profile Page */
      @media (max-width: 767px) {
        .profile-page .overview {
          flex-direction: column;
        }
      }
      .profile-page .avatar-box {
        width: 300px;
      }
      @media (min-width: 768px) {
        .profile-page .avatar-box {
          border-right: 1px solid #eee;
        }
      }
      .profile-page .avatar-box > img {
        width: 120px;
        height: 120px;
      }
      .profile-page .avatar-box .level {
        height: 6px;
        overflow: hidden;
        margin: auto;
        width: 70%;
      }
      .profile-page .avatar-box .level span {
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        background-color: var(--blue-color);
        border-radius: 6px;
      }
      .profile-page .info-box .box {
        flex-wrap: wrap;
        border-bottom: 1px solid #eee;
        transition: 0.3s;
      }
      .profile-page .info-box .box:hover {
        background-color: #f9f9f9;
      }
      .profile-page .info-box .box > div {
        min-width: 250px;
        padding: 10px 0 0;
      }
      .profile-page .info-box h4 {
        font-weight: normal;
      }
      /* Start Training Code */
      .profile-page .info-box .toggle-switch {
        height: 20px;
      }
      @media (max-width: 767px) {
        .profile-page .info-box .toggle-switch {
          margin: auto;
        }
      }
      .profile-page .info-box .toggle-switch::before {
        width: 12px;
        height: 12px;
        font-size: 8px;
      }
      .profile-page
        .info-box
        .toggle-checkbox:checked
        + .toggle-switch::before {
        left: 62px;
      }
      /* End Training Code */
      @media (max-width: 767px) {
        .profile-page .other-data {
          flex-direction: column;
        }
      }
      .profile-page .skills-card {
        flex-grow: 1;
      }
      .profile-page .skills-card ul li {
        padding: 15px 0;
      }
      .profile-page .skills-card ul li:not(:last-child) {
        border-bottom: 1px solid #eee;
      }
      .profile-page .skills-card ul li span {
        display: inline-flex;
        padding: 4px 10px;
        background-color: #eee;
        border-radius: 6px;
        font-size: 14px;
      }
      .profile-page .skills-card ul li span:not(:last-child) {
        margin-right: 5px;
      }
      .profile-page .activities {
        flex-grow: 2;
      }
      .profile-page .activity:not(:last-of-type) {
        border-bottom: 1px solid #eee;
        padding-bottom: 20px;
        margin-bottom: 20px;
      }
      .profile-page .activity img {
        width: 64px;
        height: 64px;
        margin-right: 10px;
      }
      @media (min-width: 768px) {
        .profile-page .activity .date {
          margin-left: auto;
          text-align: right;
        }
      }
      @media (max-width: 767px) {
        .profile-page .activity {
          flex-direction: column;
        }
        .profile-page .activity img {
          margin-right: 0;
          margin-bottom: 15px;
        }
        .profile-page .activity .date {
          margin-top: 15px;
        }
      }
      /* End Profile Page */
      /* Start Projects Page */
      .projects-page {
        grid-template-columns: repeat(auto-fill, minmax(500px, 1fr));
      }
      @media (max-width: 767px) {
        .projects-page {
          grid-template-columns: minmax(200px, 1fr);
          margin-left: 10px;
          margin-right: 10px;
          gap: 10px;
        }
      }
      .projects-page .project .date {
        position: absolute;
        right: 10px;
        top: 10px;
      }
      .projects-page .project h4 {
        font-weight: normal;
      }
      .projects-page .project .team {
        position: relative;
        min-height: 80px;
      }
      .projects-page .project .team a {
        position: absolute;
        left: 0;
        bottom: 0;
      }
      .projects-page .project .team a:nth-child(2) {
        left: 25px;
      }
      .projects-page .project .team a:nth-child(3) {
        left: 50px;
      }
      .projects-page .project .team a:nth-child(4) {
        left: 75px;
      }
      .projects-page .project .team a:nth-child(5) {
        left: 100px;
      }
      .projects-page .project .team a:hover {
        z-index: 1000;
      }
      .projects-page .project .team img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        border: 2px solid white;
      }
      .projects-page .project .do {
        justify-content: flex-end;
        border-top: 1px solid #eee;
        padding-top: 15px;
        margin-top: 15px;
      }
      @media (max-width: 767px) {
        .projects-page .project .do {
          flex-direction: column;
        }
      }
      .projects-page .project .do span {
        padding: 3px 8px;
        margin-left: 5px;
        width: fit-content;
      }
      @media (max-width: 767px) {
        .projects-page .project .do span:not(:last-child) {
          margin-bottom: 15px;
        }
      }
      .projects-page .project .info {
        border-top: 1px solid #eee;
        margin-top: 15px;
        padding-top: 15px;
      }
      @media (max-width: 767px) {
        .projects-page .project .info {
          flex-direction: column;
        }
      }
      .projects-page .project .prog {
        height: 8px;
        width: 260px;
        position: relative;
        border-radius: 6px;
      }
      @media (max-width: 767px) {
        .projects-page .project .prog {
          margin-bottom: 15px;
        }
      }
      .projects-page .project .prog span {
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        border-radius: 6px;
      }
      /* End Projects Page */
      /* Start Courses Page */
      .courses-page {
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
      }
      .courses-page .course .info .title {
        cursor: pointer;
        background-color: var(--blue-alt-color);
      }
      .courses-page .course {
        position: relative;
      }
      .courses-page .course .sale {
        position: absolute;
        top: 0;
        right: 0;
        padding: 10px;
        background-color: floralwhite;
        border-radius: 0px;
        color: var(--blue-color);
      }
      @media (max-width: 767px) {
        .courses-page {
          grid-template-columns: minmax(200px, 1fr);
          margin-left: 10px;
          margin-right: 10px;
          gap: 10px;
        }
      }
      .courses-page .course {
        overflow: hidden;
      }
      .courses-page .course .cover {
        width: 100%;
      }
      .courses-page .course .instructor {
        position: absolute;
        width: 64px;
        height: 64px;
        border-radius: 50%;
        top: 20px;
        left: 20px;
        border: 2px solid white;
      }
      .courses-page .course .description {
        line-height: 1.6;
      }
      .courses-page .course .info {
        border-top: 1px solid #eee;
        font-size: 13px;
      }
      .courses-page .course .info .title {
        position: absolute;
        top: -13px;
        left: 50%;
        transform: translateX(-50%);
        font-size: 13px;
      }
      /* End Courses Page */
      /* Start Friends Page */
      .friends-page {
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
      }
      @media (max-width: 767px) {
        .friends-page {
          grid-template-columns: minmax(200px, 1fr);
          margin-left: 10px;
          margin-right: 10px;
          gap: 10px;
        }
      }
      .friends-page .contact {
        position: absolute;
        left: 10px;
        top: 10px;
      }
      .friends-page .contact i {
        background-color: #eee;
        padding: 10px;
        border-radius: 50%;
        color: #666;
        font-size: 13px;
        cursor: pointer;
        transition: 0.3s;
      }
      .friends-page .contact i:hover {
        background-color: var(--blue-color);
        color: white;
      }
      .friends-page .friend .icons {
        border-top: 1px solid #eee;
        border-bottom: 1px solid #eee;
        margin-top: 15px;
        margin-bottom: 15px;
        padding-top: 15px;
        padding-bottom: 15px;
      }
      .friends-page .friend .icons i {
        margin-right: 5px;
      }
      .friends-page .friend .icons .vip {
        position: absolute;
        right: 0;
        top: 50%;
        transform: translateY(-50%);
        font-size: 40px;
        opacity: 0.2;
      }
      /* End Friends Page */
      /* Start Files Page */
      .files-page {
        flex-direction: row-reverse;
        align-items: flex-start;
      }
      @media (max-width: 767px) {
        .files-page {
          flex-direction: column;
          align-items: normal;
        }
      }
      .files-page .files-stats {
        min-width: 260px;
      }
      .files-page .files-stats .icon {
        width: 40px;
        height: 40px;
        margin-right: 10px;
      }
      .files-page .files-stats .size {
        margin-left: auto;
      }
      .files-page .files-stats .blue {
        background-color: rgb(0 117 255 / 20%);
      }
      .files-page .files-stats .green {
        background-color: rgb(34 197 94 / 20%);
      }
      .files-page .files-stats .red {
        background-color: rgb(244 67 54 / 20%);
      }
      .files-page .files-stats .orange {
        background-color: rgb(245 158 11 / 20%);
      }
      .files-page .files-stats .upload {
        margin: 15px auto 0;
        padding: 10px 15px;
        transition: 0.3s;
      }
      .files-page .files-stats .upload:hover {
        background-color: var(--blue-alt-color);
      }
      .files-page .files-stats .upload:hover i {
        animation: go-up 0.8s infinite;
      }
      .files-page .files-content {
        flex: 1;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
      }
      .files-page .files-content img {
        width: 64px;
        height: 64px;
        transition: 0.3s;
      }
      .files-page .files-content .file:hover img {
        transform: rotate(5deg);
      }
      .files-page .files-content .info {
        border-top: 1px solid #eee;
      }
      /* End Files Page */
      /* Start Plans Page */
      .plans-page {
        grid-template-columns: repeat(auto-fill, minmax(450px, 1fr));
      }
      @media (max-width: 767px) {
        .plans-page {
          grid-template-columns: minmax(250px, 1fr);
          margin-left: 10px;
          margin-right: 10px;
          gap: 10px;
        }
      }
      .plans-page .plan .top {
        border: 3px solid white;
        outline: 3px solid transparent;
      }
      .plans-page .plan.green .top {
        outline-color: var(--green-color);
      }
      .plans-page .plan.blue .top {
        outline-color: var(--blue-color);
      }
      .plans-page .plan.orange .top {
        outline-color: var(--orange-color);
      }
      .plans-page .plan .price {
        position: relative;
        font-size: 40px;
        width: fit-content;
        margin: auto;
      }
      .plans-page .plan .price span {
        position: absolute;
        left: -20px;
        top: 0;
        font-size: 25px;
      }
      .plans-page .plan ul li {
        padding: 15px 0;
        display: flex;
        align-items: center;
        font-size: 15px;
        border-bottom: 1px solid #eee;
      }
      .plans-page .plan ul li .yes {
        color: var(--green-color);
      }
      .plans-page .plan ul li i:not(.yes, .help) {
        color: var(--red-color);
      }
      .plans-page .plan ul li i:first-child {
        font-size: 18px;
        margin-right: 5px;
      }
      .plans-page .plan ul li .help {
        color: var(--grey-color);
        margin-left: auto;
        cursor: pointer;
      }
      /* End Plans Page */
      /* Start Animation */
      @keyframes change-color {
        from {
          background-color: var(--blue-color);
        }
        to {
          background-color: white;
        }
      }
      @keyframes go-up {
        0%,
        100% {
          transform: translateY(0);
        }
        50% {
          transform: translateY(-5px);
        }
      }
      /* End Animation */
      /* vica css */
      .wrapper .content table {
        width: 100%;
        border-radius: 8px;
        border: 0.6px solid #d5d5d5;
        background-color: white;
        border-collapse: collapse;
      }
      .wrapper .content table thead {
      }
      .wrapper .content table thead tr {
        border-bottom: 0.6px solid #d5d5d5;
      }
      .wrapper .content table tbody {
      }
      .wrapper .content table tbody tr:not(:last-of-type) {
        border-bottom: 0.4px solid #979797;
      }
      .wrapper .content table tbody tr td,
      .wrapper .content table thead tr th {
        text-align: center;
        padding: 30px;
      }
      .btn {
        width: 124px;
        height: 34px;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 7px;
        font-size: 12px;
        font-weight: bold;
        color: white;
        cursor: pointer;
        border: 1px solid var(--blue-color);
        background-color: var(--blue-color);
        transition: 0.5s;
      }
      .btn:hover {
        /* box-shadow: rgba(17, 17, 26, 0.1) 0px 4px 16px,
    rgba(17, 17, 26, 0.1) 0px 8px 24px, rgba(17, 17, 26, 0.1) 0px 16px 56px; */
        background-color: var(--blue-alt-color);
      }

      @media (max-width: 991px) {
      }
      @media (max-width: 991px) {
        .page aside .header {
          justify-content: space-between;
        }
        .page aside {
          position: absolute;
          left: -100%;
        }
        .wrapper .content table {
          border: none;
          background-color: transparent;
        }
        .wrapper .content table thead {
          display: none;
        }

        .wrapper .content table tbody tr {
          display: block;
          margin-bottom: 30px;
        }

        .wrapper .content table tbody tr td {
          display: flex;
          justify-content: space-between;
          padding: 10px;
          border: 1px solid #d5d5d5;
        }

        .wrapper .content table tbody tr td::before {
          content: attr(data-label);
          font-weight: bold;
          margin-right: 10px;
        }
      }
      /* Product */
      .wrapper .content table td > img {
        width: 100px;
      }
      .wrapper .content table .btns,
      .courses-page .btns {
        display: flex;
        justify-content: center;
        align-items: center;
      }
      .courses-page .btns {
        gap: 10px;
      }
      .wrapper .content table .btns img,
      .courses-page .btns img {
        width: 15px;
        height: 15px;
      }
      table tbody tr img {
        width: 56px;
        height: 60px;
        border-radius: 8px;
      }
      table tbody td .control-btn,
      .courses-page .control-btn {
        width: 48px;
        height: 41px;
        padding: 9px 16px;
        border-radius: 20px;
        border: 0.6px solid #d5d5d5;
        background-color: transparent;
        cursor: pointer;
      }
      .courses-page .control-btn {
        width: fit-content;
        height: auto;
        border: none;
        padding: 0px;
      }
      table tbody td .control-btn.edit,
      .courses-page .control-btn.edit {
        border-right: none;
        border-radius: 8px 0px 0px 8px;
      }
      table tbody td .control-btn.delete,
      .courses-page .control-btn.delete {
        border-radius: 0px 8px 8px 0px;
      }
      table tbody td .control-btn img,
      .courses-page .control-btn img {
        width: 15px;
        height: 15px;
        transition: 0.5s;
      }
      table tbody td .control-btn i,
      .courses-page .control-btn i {
        transition: 0.5s;
      }
      table tbody td .control-btn:hover img,
      table tbody td .control-btn:hover i,
      .courses-page .control-btn:hover i,
      .courses-page .control-btn:hover img {
        transform: scale(1.1);
      }

      /* override & new things */
      .special-head {
        margin: 20px 20px 40px;
        display: flex;
        justify-content: space-between;
        align-items: center;
      }
      .page h1 {
        margin: 0px;
      }
      .wrapper {
        grid-template-columns: none;
      }
      /* my edit */
      .sidebar,
      .head {
        background-color: #f6f6f6;
      }
      .wrapper .cities-holder .box {
        background-color: white;
      }
      /* css */
      .filters,
      .filters-holder {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        div {
          display: flex;
          align-items: center;
          gap: 30px;
        }
      }
      .filters {
        margin: 20px 20px 0px;
      }
      .filters-holder {
        gap: 30px;
      }
      .filters .search::before {
        font-family: var(--fa-style-family-classic);
        content: "\f002";
        font-weight: 900;
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 14px;
        color: var(--grey-color);
      }
      .filters .search input {
        border: 1px solid #ccc;
        border-radius: 10px;
        margin-left: 5px;
        padding-left: 30px;
        width: 160px;
        transition: width 0.3s;
      }
      .filters .search input:focus {
        width: 200px;
      }
      .filters .search input:focus::placeholder {
        opacity: 0;
      }
      /* cards */
      .wrapper .cities-holder .box {
        width: calc(50% - 10px);
        border: 1px solid #ccc;
      }
      .wrapper .cities-holder .box .btns {
        margin-top: 10px;
      }
      .wrapper .cities-holder .box .control-btn {
        transition: 0.3s;
        cursor: pointer;
      }
      .wrapper .cities-holder .box .control-btn:hover {
        transform: scale(1.1);
      }
      .wrapper .cities-holder .box button {
        border: none;
        background-color: transparent;
        padding: 0px;
      }
      @media (max-width: 767px) {
        .wrapper .cities-holder .box {
          width: 100%;
        }
      }
      /* overlay */
      .overlay {
        width: 100%;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        position: fixed;
        top: 0;
        left: 0;
        background: #00000080;
        z-index: 100;
      }
      .overlay.more-infos {
        background-color: transparent;
      }
      .overlay.more-infos .back {
        position: fixed;
        width: 100%;
        height: 100%;
        background: #00000080;
      }
      .overlay.more-infos .content {
        display: block;
        height: auto;
        ul {
          margin: 0px;
          p {
            font-size: 14px;
            color: var(--grey-color);
          }
          .colors {
            display: flex;
            gap: 10px;
          }
          p.color {
            width: 30px;
            height: 30px;
            border-radius: 8px;
          }
        }
        ul.size {
          display: flex;
          justify-content: space-between;
          align-items: center;
          border-bottom: 1px solid #eee;
          margin-bottom: 30px;
          padding-bottom: 10px;
        }
        ul.detailed-infos {
          display: grid;
          grid-template-columns: repeat(auto-fill, minmax(1fr));
          gap: 20px 30px;

          li {
            display: flex;
            justify-content: space-between;
            align-items: center;
            h4,
            p {
              margin: 0px;
            }
          }
        }
      }
      .overlay .content {
        position: fixed;
        padding: 40px;
        min-width: 50%;
        height: 321px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 50px;
        border-radius: 20px;
        background-color: white;
      }
      .overlay .content p {
        text-align: center;
        font-size: 24px;
        font-weight: bold;
      }
      .overlay .content .btns {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: center;
        gap: 26px;
      }
      .overlay .content .btns .popup-btn {
        width: 140px;
        height: 50px;
        border-radius: 4px;
        font-size: 15px;
        color: white;
        border: none;
        cursor: pointer;
        transition: 0.5s;
        display: flex;
        justify-content: center;
        align-items: center;
      }
      .overlay .content .btns .popup-btn:hover {
        transform: scale(0.95);
      }
      .overlay .content .btns .popup-btn.confirm {
        background-color: var(--red-color);
      }
      .overlay .content .btns .popup-btn.cancel {
        background-color: var(--blue-color);
      }
      .overlay.notification .content {
        position: relative;
      }
      .overlay.notification img {
        position: absolute;
        top: -90px;
        left: 50%;
        transform: translateX(-50%);
        width: 180px;
      }
      .overlay.notification .text {
        margin-top: 20px;
      }
      .overlay.notification .content p {
        font-size: 30px;
      }
      /* accordion */
      .accordion .accordion-holder {
        display: flex;
        justify-content: space-between;
        align-items: center;
        position: relative;
      }
      .accordion .icon {
        font-size: 12px;
        position: absolute;
        top: 0;
        right: 0;
        height: 100%;
        width: 25px;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
      }
      .accordion .accordion-list {
        display: none;
      }
      .accordion .accordion-list a.active,
      .accordion .accordion-list a:hover {
        background-color: transparent;
      }
      /*  */
      .btn.reset-btn {
        background-color: #c0c0c0;
        color: var(--blue-color);
        border: none;
      }
      .btn.reset-btn:hover {
        box-shadow: rgba(17, 17, 26, 0.1) 0px 4px 16px,
          rgba(17, 17, 26, 0.1) 0px 8px 24px,
          rgba(17, 17, 26, 0.1) 0px 16px 56px;
      }
      .friend {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
      }
    </style>
  </head>
  <body>
    <div class="page d-flex">
      <div class="sidebar p-20 p-relative">
        <div class="holder">
          <div class="logo-holder">
            <img
              style="width: 30px; height: 30px"
              src="../imgs/logo.png"
              alt=""
            />
            <h3 class="p-relative txt-c mt-0">ArchiLink</h3>
          </div>
          <ul>
            <li>
              <a
                class="d-flex align-center fs-14 c-black rad-6 p-10"
                href="index.html"
              >
                <i class="fa-regular fas fa-box"></i>
                <span>Product</span>
              </a>
            </li>

            <li class="accordion">
              <div
                class="accordion-holder d-flex align-center fs-14 c-black rad-6 p-10"
              >
                <div class="holder">
                  <i class="fas fa-receipt"></i>
                  <span>Order</span>
                </div>
                <div
                  class="icon closed"
                  onclick="showNestedList(true,event,this)"
                >
                  <i class="arrow fas fa-angle-down"></i>
                </div>
              </div>
              <div class="accordion-list" style="padding-left: 10px">
                <a
                  class="d-flex align-center fs-14 c-black rad-6 p-10"
                  href="shop.html"
                >
                  <i class="fas fa-store"></i>
                  <span>Shop</span>
                </a>
                <a
                  class="d-flex align-center fs-14 c-black rad-6 p-10"
                  href="customize.html"
                >
                  <i class="fas fa-sliders-h"></i>
                  <span>Customize</span>
                </a>
              </div>
            </li>
            <li>
              <a
                class="active d-flex align-center fs-14 c-black rad-6 p-10"
                href="delivery.html"
              >
                <i class="fa-solid fas fa-truck"></i>
                <span>Delivery</span>
              </a>
            </li>
            <li class="accordion">
              <div
                class="accordion-holder d-flex align-center fs-14 c-black rad-6 p-10"
              >
                <div class="holder">
                  <i class="far fa-trash-alt fa-fw"></i>
                  <span>Deleted Items</span>
                </div>
                <div
                  class="icon closed"
                  onclick="showNestedList(true,event,this)"
                >
                  <i class="arrow fas fa-angle-down"></i>
                </div>
              </div>
              <div class="accordion-list" style="padding-left: 10px">
                <a
                  class="d-flex align-center fs-14 c-black rad-6 p-10"
                  href="productTrash.html"
                >
                  <i class="fas fa-box-open"></i>
                  <span>Product Trash</span>
                </a>
                <a
                  class="d-flex align-center fs-14 c-black rad-6 p-10"
                  href="deliveryTrash.html"
                >
                  <i class="fas fa-dumpster"></i>
                  <span>Delivery Trash</span>
                </a>
              </div>
            </li>
          </ul>
          <button
            style="
              padding: 10px 15px;
              border-radius: 6px;
              border: none;
              color: white;
              background-color: #1a1a1a;
              position: absolute;
              bottom: 10%;
              left: 50%;
              transform: translateX(-50%);
              width: 100%;
            "
            class="logout"
          >
            <i class="log-out-icon fas fa-power-off"></i>
            <span>Logout</span>
          </button>
        </div>
      </div>
      <div class="content w-full">
        <!-- Start Head -->
        <div class="head p-15 between-flex">
          <p style="margin: 0px">Delivery</p>
          <div class="icons d-flex align-center">
            <span
              style="cursor: pointer"
              class="notification p-relative"
              onclick="handlePopUp(true,1)"
            >
              <i class="fa-regular fa-bell fa-lg"></i>
            </span>
            <a href="profile.html">
              <img src="../imgs/avatar.png" alt="" />
            </a>
          </div>
        </div>
        <!-- End Head -->
        <div class="special-head">
          <h1 class="p-relative">Manage Delivery</h1>
          <a href="{{ route('add-delivery')}}" class="btn">+ Add Delivery</a>
        </div>
        <div class="wrapper d-grid gap-20">
          <div class="filters" style="justify-content: space-between">
            <div class="filters-holder">
              <label style="color: var(--blue-color)" for="area-search"
                >Delivery Name:</label
              >
              <div class="search p-relative">
                <input
                  id="area-search"
                  class="p-10"
                  type="search"
                  placeholder="Type An Area"
                />
              </div>
              <label style="color: var(--blue-color)" for="cities-select"
                >Area:</label
              >
              <select
                id="cities-select"
                style="
                  padding: 5px;
                  border: 1px solid #ccc;
                  color: #888;
                  background-color: white;
                  box-shadow: none;
                "
                class="btn"
                name="area"
                onchange=""
              >
                <option value="All">All</option>
                <option value="Homs">Homs</option>
                <option value="Damascus">Damascus</option>
                <option value="Hama">Hama</option>
                <option value="Aleppo">Aleppo</option>
              </select>
              <label style="color: var(--blue-color)" for="status-select"
                >Status:</label
              >
              <select
                id="status-select"
                style="
                  padding: 5px;
                  border: 1px solid #ccc;
                  color: #888;
                  background-color: white;
                  box-shadow: none;
                "
                class="btn"
                name="status"
              >
                <option value="All">All</option>
                <option value="Busy">Busy</option>
                <option value="Free">Free</option>
              </select>
            </div>
            <div class="btn reset-btn" onclick="resetFilters()">Reset</div>
          </div>
          <div class="show-products content">
            <table>
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone Number</th>
                  <th>Work Place</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ( $deliveries as $delivery )
                <tr scope="row">
                  <td data-label="Name">{{ $delivery->name }}</td>
                  <td data-label="Email">{{ $delivery->email }}</td>
                  <td data-label="Phone Number">{{ $delivery->phone_number }}</td>
                  <td data-label="Area">{{ $delivery->area->city->city_name }} - {{ $delivery->area->area_name }}</td>
                  <td data-label="Status">{{ $delivery->busy }}
                </td>
                  <td data-label="Action">
                    <div class="btns">
                      <a href="{{ route('edit-delivery' ,$delivery->id )}}" class="control-btn edit">
                        <img src="{{ asset('../imgs/pencil-write.png')}}" alt="edit" />
                      </a>
                      <button
                        class="control-btn delete"
                        onclick="handlePopUp(true, {{ $delivery->id }})"
                      >
                        <img src="{{ asset('../imgs/bin.png')}}" alt="del" />
                      </button>
                    </div>
                  </td>
                  @endforeach
                <!--</tr>
                <tr scope="row">
                  <td data-label="Name">Jhon Doe2</td>
                  <td data-label="Email">JhonDoe2@gmail.com</td>
                  <td data-label="Phone Number">0993811280</td>
                  <td data-label="Area">Damascus</td>
                  <td data-label="Status">Free</td>
                  <td data-label="Action">
                    <div class="btns">
                      <a href="editDelivery.html" class="control-btn edit">
                        <img src="../imgs/pencil-write.png" alt="edit" />
                      </a>
                      <button
                        class="control-btn delete"
                        onclick="handlePopUp(true,0)"
                      >
                        <img src="../imgs/bin.png" alt="del" />
                      </button>
                    </div>
                  </td>
                </tr>
                <tr scope="row">
                  <td data-label="Name">Jhon Doe3</td>
                  <td data-label="Email">JhonDoe3@gmail.com</td>
                  <td data-label="Phone Number">0993811280</td>
                  <td data-label="Area">Hama</td>
                  <td data-label="Status">Busy</td>
                  <td data-label="Action">
                    <div class="btns">
                      <a href="editDelivery.html" class="control-btn edit">
                        <img src="../imgs/pencil-write.png" alt="edit" />
                      </a>
                      <button
                        class="control-btn delete"
                        onclick="handlePopUp(true,0)"
                      >
                        <img src="../imgs/bin.png" alt="del" />
                      </button>
                    </div>
                  </td>
                </tr>
                <tr scope="row">
                  <td data-label="Name">Jhon Doe4</td>
                  <td data-label="Email">JhonDoe4@gmail.com</td>
                  <td data-label="Phone Number">0993811280</td>
                  <td data-label="Area">Aleppo</td>
                  <td data-label="Status">Busy</td>
                  <td data-label="Action">
                    <div class="btns">
                      <a href="editDelivery.html" class="control-btn edit">
                        <img src="../imgs/pencil-write.png" alt="edit" />
                      </a>
                      <button
                        class="control-btn delete"
                        onclick="handlePopUp(true,0)"
                      >
                        <img src="../imgs/bin.png" alt="del" />
                      </button>
                    </div>
                  </td>
                </tr>-->
              </tbody>
            </table>
          </div>
          <div class="overlay" style="display: none">
            <div class="content">
              <p>Are You Sure You Want To Delete It?</p>
              <div class="btns">
                <!--<button class="confirm popup-btn">Yes</button>-->
                <form id="deleteForm" action="" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="confirm popup-btn">Yes</button>
                </form>
                <button class="cancel popup-btn" onclick="handlePopUp(false,0)">
                  No
                </button>
              </div>
            </div>
          </div>
          <div class="overlay notification" style="display: none">
            <div class="content">
              <img src="../imgs/newOrder.png" alt="" />
              <div class="text">
                <p>You Have 3 new Orders!!</p>
                <div class="btns">
                  <a
                    href="order.html"
                    class="confirm popup-btn"
                    style="background-color: var(--blue-alt-color)"
                  >
                    View
                  </a>
                  <button
                    class="cancel popup-btn"
                    style="background-color: var(--red-color)"
                    onclick="handlePopUp(false,1)"
                  >
                    Dismiss
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script>
      const overlay = document.querySelectorAll(".overlay");
function handlePopUp(isShow, deliveryId) {
  if (isShow) {
    overlay[0].style.display = "flex";
    document.getElementById("deleteForm").action = "/deliveries/" + deliveryId;
  } else {
    overlay[0].style.display = "none";
  }
}

      // accordion
      const accordion = document.querySelectorAll(".accordion");
      function showNestedList(isShow, event, element) {
        event.preventDefault();
        if (element.classList.contains("closed")) {
          element.classList.toggle("closed");
          element.children[0].className = "arrow 	fas fa-angle-up";
          element.parentElement.parentElement.children[1].style.display =
            "block";
        } else {
          element.classList.toggle("closed");
          element.children[0].className = "arrow 	fas fa-angle-down";
          element.parentElement.parentElement.children[1].style.display =
            "none";
        }
      }
      // filters
      const nameInput = document.getElementById("area-search");
      const areaSelect = document.getElementById("cities-select");
      const statusSelect = document.getElementById("status-select");
      const rows = document.querySelectorAll("tbody tr");

      // دالة تجيب قيمة الخلية حسب data-label
      function getCellValue(row, label) {
        const cell = Array.from(row.children).find(
          (td) => td.getAttribute("data-label") === label
        );
        return cell ? cell.textContent.trim().toLowerCase() : "";
      }

      function filterTable() {
        const nameFilter = nameInput.value.trim().toLowerCase();
        const areaFilter = areaSelect.value.toLowerCase();
        const statusFilter = statusSelect.value.toLowerCase();

        rows.forEach((row) => {
          const name = getCellValue(row, "Name");
          const area = getCellValue(row, "Area");
          const status = getCellValue(row, "Status");

          const matchName = name.includes(nameFilter);
          const matchArea = areaFilter === "all" || area === areaFilter;
          const matchStatus = statusFilter === "all" || status === statusFilter;

          if (matchName && matchArea && matchStatus) {
            row.style.display = "";
          } else {
            row.style.display = "none";
          }
        });
      }

      function resetFilters() {
        nameInput.value = "";
        areaSelect.value = "All";
        statusSelect.value = "All";
        filterTable();
      }

      nameInput.addEventListener("input", filterTable);
      areaSelect.addEventListener("change", filterTable);
      statusSelect.addEventListener("change", filterTable);
    </script>
  </body>
</html>
