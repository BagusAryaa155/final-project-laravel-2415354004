<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>ERP</title>

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"
        rel="stylesheet"
    >

    <script src="https://cdn.tailwindcss.com"></script>

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    >

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            font-family:'Inter',sans-serif;
            background:#f3f4f6;
        }

        .layout{
            display:flex;
            min-height:100vh;
        }

        .sidebar{
            width:260px;
            background:white;
            border-right:1px solid #e5e7eb;
            display:flex;
            flex-direction:column;
            justify-content:space-between;
        }

        .sidebar-top{
            padding:24px;
        }

        .logo{
            display:flex;
            align-items:center;
            gap:14px;
            margin-bottom:40px;
        }

        .logo-box{
            width:52px;
            height:52px;
            border-radius:14px;
            background:#374151;
            display:flex;
            align-items:center;
            justify-content:center;
            color:white;
            font-size:24px;
            font-weight:700;
        }

        .logo-title{
            font-size:34px;
            font-weight:700;
            color:#111827;
            line-height:1;
        }

        .menu{
            display:flex;
            flex-direction:column;
            gap:10px;
        }

        .menu a{
            text-decoration:none;
            display:flex;
            align-items:center;
            gap:14px;
            color:#374151;
            padding:14px 18px;
            border-radius:14px;
            transition:0.2s;
            font-size:16px;
            font-weight:500;
        }

        .menu a:hover{
            background:#f3f4f6;
        }

        .menu a.active{
            background:#f3f4f6;
            color:#111827;
        }

        .main{
            flex:1;
            padding:28px;
        }

        .topbar{
            background:white;
            border-radius:18px;
            padding:22px 28px;
            margin-bottom:24px;
            border:1px solid #e5e7eb;
        }

        .page-title{
            font-size:34px;
            font-weight:700;
            color:#111827;
            margin-bottom:4px;
        }

        .page-subtitle{
            color:#6b7280;
            font-size:15px;
        }

        .content-card{
            background:white;
            border-radius:18px;
            border:1px solid #e5e7eb;
            padding:24px;
        }

        .table{
            margin-bottom:0;
        }

        .table th{
            color:#374151;
            font-weight:600;
            padding:18px;
        }

        .table td{
            color:#374151;
            padding:18px;
            vertical-align:middle;
        }

        .status-active{
            background:#dcfce7;
            color:#16a34a;
            padding:4px 12px;
            border-radius:999px;
            font-size:12px;
            font-weight:600;
            display:inline-block;
        }

        .btn-add{
            background:#394149;
            color:white;
            border:none;
            padding:12px 20px;
            border-radius:12px;
            font-weight:600;
        }

        .btn-add:hover{
            background:#2f353b;
        }

        .modal-content{
            border:none;
            border-radius:20px;
            padding:10px;
        }

        .form-control{
            background:#f3f4f6;
            border:none;
            border-radius:12px;
            padding:14px 16px;
            box-shadow:none !important;
        }

        .form-control:focus{
            background:#f3f4f6;
            border:none;
        }

        textarea.form-control{
            resize:none;
        }

        .btn-submit{
            background:#394149;
            color:white;
            border:none;
            border-radius:12px;
            padding:12px 24px;
            font-weight:600;
        }

        .btn-cancel{
            background:white;
            border:1px solid #d1d5db;
            color:#374151;
            border-radius:12px;
            padding:12px 24px;
            font-weight:500;
        }

    </style>

</head>

<body>

<div class="layout">

    <div class="sidebar">

        <div class="sidebar-top">

            <div class="logo">

                <div class="logo-box">
                    E
                </div>

                <div>

                    <div class="logo-title">
                        ERP
                    </div>

                </div>

            </div>

            <div class="menu">

                <a href="#">
                    Users
                </a>

                <a
                    href="/customers"
                    class="{{ $active == 'customers' ? 'active' : '' }}"
                >
                    Customers
                </a>

                <a
                    href="/services"
                    class="{{ $active == 'services' ? 'active' : '' }}"
                >
                    Services
                </a>

                <a
                    href="/subscriptions"
                    class="{{ $active == 'subscriptions' ? 'active' : '' }}"
                >
                    Subscription
                </a>

            </div>

        </div>

    </div>

    <div class="main">

        <div class="topbar">

            <div class="page-title">
                @yield('title')
            </div>

            <div class="page-subtitle">
                ERP Management Dashboard
            </div>

        </div>

        @yield('content')

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

@stack('scripts')

</body>
</html>