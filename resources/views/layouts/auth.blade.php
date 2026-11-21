<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Autentikasi') - Inventaris Gudang</title>
    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0;
            min-height: 100vh;
            padding: 28px;
            display: grid;
            place-items: center;
            color: #172033;
            background: #f2f5fa;
            font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
        }
        .auth-shell {
            width: min(100%, 980px);
            min-height: 590px;
            display: grid;
            grid-template-columns: 0.95fr 1.05fr;
            overflow: hidden;
            border-radius: 24px;
            background: #fff;
            box-shadow: 0 24px 70px rgba(28, 48, 83, .12);
        }
        .auth-aside {
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 42px;
            overflow: hidden;
            color: white;
            background: linear-gradient(145deg, #173b70 0%, #176c85 100%);
        }
        .auth-aside::before, .auth-aside::after {
            position: absolute;
            content: "";
            border: 1px solid rgba(255,255,255,.13);
            border-radius: 50%;
        }
        .auth-aside::before { width: 360px; height: 360px; right: -150px; top: 90px; }
        .auth-aside::after { width: 250px; height: 250px; right: -95px; top: 145px; }
        .brand, .aside-copy, .aside-foot { position: relative; z-index: 1; }
        .brand { display: flex; align-items: center; gap: 12px; font-weight: 750; letter-spacing: .2px; }
        .brand-mark {
            width: 42px; height: 42px; display: grid; place-items: center;
            border: 1px solid rgba(255,255,255,.25); border-radius: 13px;
            background: rgba(255,255,255,.14); font-size: 20px;
        }
        .aside-copy { max-width: 360px; margin: 55px 0; }
        .aside-copy .eyebrow { color: #b8e6ee; font-size: 12px; font-weight: 700; letter-spacing: 1.8px; text-transform: uppercase; }
        .aside-copy h1 { margin: 16px 0; font-size: clamp(30px, 4vw, 42px); line-height: 1.13; letter-spacing: -1.4px; }
        .aside-copy p { color: rgba(255,255,255,.78); line-height: 1.7; font-size: 14px; }
        .aside-foot { color: rgba(255,255,255,.58); font-size: 12px; }
        .auth-main { display: flex; align-items: center; justify-content: center; padding: 54px 58px; }
        .auth-form { width: 100%; max-width: 370px; }
        .auth-form h2 { margin: 0 0 8px; color: #18243a; font-size: 27px; letter-spacing: -.7px; }
        .form-intro { margin: 0 0 30px; color: #778399; font-size: 14px; line-height: 1.6; }
        .form-group { margin-bottom: 19px; }
        label { display: block; margin-bottom: 8px; color: #344158; font-size: 13px; font-weight: 650; }
        input[type="text"], input[type="email"], input[type="password"] {
            width: 100%; height: 48px; padding: 0 14px;
            border: 1px solid #dce3ed; border-radius: 10px;
            outline: none; background: #fbfcfe; color: #18243a; font: inherit; font-size: 14px;
            transition: border-color .15s, box-shadow .15s;
        }
        input:focus { border-color: #2876a2; box-shadow: 0 0 0 3px rgba(40,118,162,.12); }
        input::placeholder { color: #a2adbd; }
        .field-error { margin-top: 7px; color: #c93636; font-size: 12px; }
        .alert { margin-bottom: 20px; padding: 12px 14px; border-radius: 9px; font-size: 13px; line-height: 1.5; }
        .alert-error { color: #a42b2b; background: #fff0f0; border: 1px solid #ffdada; }
        .alert-success { color: #17643b; background: #edfbf2; border: 1px solid #c9efd6; }
        .remember-row { display: flex; align-items: center; gap: 9px; margin: 2px 0 22px; color: #657187; font-size: 13px; }
        .remember-row input { accent-color: #176c85; width: 15px; height: 15px; }
        .submit-button {
            width: 100%; min-height: 49px; border: 0; border-radius: 10px;
            color: #fff; background: #176c85; cursor: pointer;
            font: inherit; font-size: 14px; font-weight: 700;
            transition: background .15s, transform .15s;
        }
        .submit-button:hover { background: #12566c; transform: translateY(-1px); }
        .auth-switch { margin: 23px 0 0; color: #7b8799; text-align: center; font-size: 13px; }
        .auth-switch a { color: #176c85; font-weight: 700; text-decoration: none; }
        .auth-switch a:hover { text-decoration: underline; }
        @media (max-width: 760px) {
            body { padding: 16px; }
            .auth-shell { max-width: 480px; min-height: 0; grid-template-columns: 1fr; }
            .auth-aside { min-height: 180px; padding: 25px 28px; }
            .aside-copy { margin: 32px 0 10px; }
            .aside-copy h1 { max-width: 320px; margin: 10px 0; font-size: 27px; }
            .aside-copy p, .aside-foot { display: none; }
            .auth-main { padding: 34px 28px 38px; }
        }
    </style>
</head>
<body>
    <div class="auth-shell">
        <aside class="auth-aside">
            <div class="brand">
                <div class="brand-mark">▦</div>
                <span>Inventaris Gudang</span>
            </div>
            <div class="aside-copy">
                <div class="eyebrow">Warehouse Management</div>
                <h1>Kelola inventaris dengan lebih teratur.</h1>
                <p>Masuk ke ruang kerja untuk mengelola data supplier dan informasi inventaris gudang.</p>
            </div>
            <div class="aside-foot">Sistem Informasi Inventaris Gudang</div>
        </aside>

        <main class="auth-main">
            <section class="auth-form">
                @yield('content')
            </section>
        </main>
    </div>
</body>
</html>
