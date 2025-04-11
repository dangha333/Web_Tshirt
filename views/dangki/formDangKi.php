<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Đăng Nhập Admin</title>

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
  <script data-cfasync="false"
    nonce="7c3e3094-7a7b-4e93-8a9e-8b6d28fa31d2">
    try {
      (function(w, d) {
        ! function(ne, nf, ng, nh) {
          if (ne.zaraz) console.error("zaraz is loaded twice");
          else {
            ne[ng] = ne[ng] || {};
            ne[ng].executed = [];
            ne.zaraz = {
              deferred: [],
              listeners: []
            };
            ne.zaraz._v = "5823";
            ne.zaraz._n = "7c3e3094-7a7b-4e93-8a9e-8b6d28fa31d2";
            ne.zaraz.q = [];
            ne.zaraz._f = function(ni) {
              return async function() {
                var nj = Array.prototype.slice.call(arguments);
                ne.zaraz.q.push({
                  m: ni,
                  a: nj
                })
              }
            };
            for (const nk of ["track", "set", "debug"]) ne.zaraz[nk] = ne.zaraz._f(nk);
            ne.zaraz.init = () => {
              var nl = nf.getElementsByTagName(nh)[0],
                nm = nf.createElement(nh),
                nn = nf.getElementsByTagName("title")[0];
              nn && (ne[ng].t = nf.getElementsByTagName("title")[0].text);
              ne[ng].x = Math.random();
              ne[ng].w = ne.screen.width;
              ne[ng].h = ne.screen.height;
              ne[ng].j = ne.innerHeight;
              ne[ng].e = ne.innerWidth;
              ne[ng].l = ne.location.href;
              ne[ng].r = nf.referrer;
              ne[ng].k = ne.screen.colorDepth;
              ne[ng].n = nf.characterSet;
              ne[ng].o = (new Date).getTimezoneOffset();
              if (ne.dataLayer)
                for (const no of Object.entries(Object.entries(dataLayer).reduce(((np, nq) => ({
                    ...np[1],
                    ...nq[1]
                  })), {}))) zaraz.set(no[0], no[1], {
                  scope: "page"
                });
              ne[ng].q = [];
              for (; ne.zaraz.q.length;) {
                const nr = ne.zaraz.q.shift();
                ne[ng].q.push(nr)
              }
              nm.defer = !0;
              for (const ns of [localStorage, sessionStorage]) Object.keys(ns || {}).filter((nu => nu.startsWith("_zaraz_"))).forEach((nt => {
                try {
                  ne[ng]["z_" + nt.slice(7)] = JSON.parse(ns.getItem(nt))
                } catch {
                  ne[ng]["z_" + nt.slice(7)] = ns.getItem(nt)
                }
              }));
              nm.referrerPolicy = "origin";
              nm.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(ne[ng])));
              nl.parentNode.insertBefore(nm, nl)
            };
            ["complete", "interactive"].includes(nf.readyState) ? zaraz.init() : ne.addEventListener("DOMContentLoaded", zaraz.init)
          }
        }(w, d, "zarazData", "script");
        window.zaraz._p = async br => new Promise((bs => {
          if (br) {
            br.e && br.e.forEach((bt => {
              try {
                const bu = d.querySelector("script[nonce]"),
                  bv = bu?.nonce || bu?.getAttribute("nonce"),
                  bw = d.createElement("script");
                bv && (bw.nonce = bv);
                bw.innerHTML = bt;
                bw.onload = () => {
                  d.head.removeChild(bw)
                };
                d.head.appendChild(bw)
              } catch (bx) {
                console.error(`Error executing script: ${bt}\n`, bx)
              }
            }));
            Promise.allSettled((br.f || []).map((by => fetch(by[0], by[1]))))
          }
          bs()
        }));
        zaraz._p({
          "e": ["(function(w,d){})(window,document)"]
        });
      })(window, document)
    } catch (e) {
      throw fetch("/cdn-cgi/zaraz/t"), e;
    };
  </script>
</head>

<style media="screen">
  *,
  *:before,
  *:after {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
  }

  body {
    background-color: #080710;
  }

  .background {
    width: 430px;
    height: 520px;
    position: absolute;
    transform: translate(-50%, -50%);
    left: 50%;
    top: 50%;
  }

  .background .shape {
    height: 200px;
    width: 200px;
    position: absolute;
    border-radius: 50%;
  }

  .shape:first-child {
    background: linear-gradient(#1845ad,
        #23a2f6);
    left: -80px;
    top: -80px;
  }

  .shape:last-child {
    background: linear-gradient(to right,
        #ff512f,
        #f09819);
    right: -30px;
    bottom: -80px;
  }

  form {
    height: 520px;
    width: 400px;
    background-color: rgba(255, 255, 255, 0.13);
    position: absolute;
    transform: translate(-50%, -50%);
    top: 50%;
    left: 50%;
    border-radius: 10px;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255, 255, 255, 0.1);
    box-shadow: 0 0 40px rgba(8, 7, 16, 0.6);
    padding: 50px 35px;
  }

  form * {
    font-family: 'Poppins', sans-serif;
    color: #ffffff;
    letter-spacing: 0.5px;
    outline: none;
    border: none;
  }

  form h3 {
    font-size: 32px;
    font-weight: 500;
    line-height: 42px;
    text-align: center;
  }

  label {
    display: block;
    margin-top: 30px;
    font-size: 16px;
    font-weight: 500;
  }

  input {
    display: block;
    height: 50px;
    width: 100%;
    background-color: rgba(255, 255, 255, 0.07);
    border-radius: 3px;
    padding: 0 10px;
    margin-top: 8px;
    font-size: 14px;
    font-weight: 300;
  }

  ::placeholder {
    color: #e5e5e5;
  }

  button {
    width: 100%;
    background-color: #ffffff;
    color: #080710;
    padding: 15px 0;
    font-size: 18px;
    font-weight: 600;
    border-radius: 5px;
    cursor: pointer;
  }

  .social {
    margin-top: 30px;
    display: flex;
  }

  .social div {
    background: red;
    width: 150px;
    border-radius: 3px;
    padding: 5px 10px 10px 5px;
    background-color: rgba(255, 255, 255, 0.27);
    color: #eaf0fb;
    text-align: center;
  }

  .social div:hover {
    background-color: rgba(255, 255, 255, 0.47);
  }

  .social .fb {
    margin-left: 25px;
  }

  .social i {
    margin-right: 4px;
  }

  .error-message {
    margin: 1em 0;
    color: #ff512f;
  }
</style>
<style>
  .register-btn {
    font-size: 12px;
    /* Kích thước chữ nhỏ hơn */
    padding: 8px 16px;
    /* Điều chỉnh khoảng cách bên trong nút */
    background-color: #f1f1f1;
    /* Màu nền nhạt hơn */
    color: #333;
    /* Màu chữ */
    border: 1px solid #ccc;
    /* Đường viền nhẹ */
    border-radius: 4px;
    /* Bo góc */
    cursor: pointer;
  }

  .register-btn:hover {
    background-color: #ddd;
    /* Hiệu ứng khi hover */
  }
</style>


<body class="hold-transition login-page">
  <div class="background">
    <?php if (isset($_SESSION['eror'])) { ?>
      <p class="text-danger"><?= $_SESSION['error'] ?></p>
    <?php } else { ?>
      <p class="login-box-msg"> Vui lòng đăng nhập</p>

    <?php } ?>
    <div class="shape"></div>
    <div class="shape"></div>
  </div>
  <form action="?act=check-dang-ky" method="post">

    <label for="email">Email</label>
    <input type="email" placeholder="Email or Phone" id="email" name="email">

    <label for="password">Password</label>
    <input type="password" placeholder="Password" id="password" name="password">




    <label for="password">Họ tên</label>
    <input type="text" placeholder="Họ tên" id="password" name="ho_ten">

    <label for="so_dien_thoai">Số điện thoại</label>
    <input type="text" placeholder="Số điện thoại" id="so_dien_thoai" name="so_dien_thoai">



    <button style="margin-top: 50px;" type="submit">OK</button>

    <div class="err"></div>

  </form>
  <script src="./assets/plugins/jquery/jquery.min.js"></script>
  <script src="./assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="./assets/dist/js/adminlte.min.js?v=3.2.0"></script>
</body>

</html>