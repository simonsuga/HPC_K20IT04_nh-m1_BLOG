<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>

@include('admin.layout.style')


  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        @include('admin.layout.menu')
        @include('admin.layout.navbar')
        @yield('content')


        @include('admin.layout.header')


        <div class="content-backdrop fade"></div>
    </div>
    <!-- Content wrapper -->
  </div>
  <!-- / Layout page -->
</div>

<!-- Overlay -->
<div class="layout-overlay layout-menu-toggle"></div>
</div>
<!-- / Layout wrapper -->

<div class="buy-now">
<a
  href="https://themeselection.com/products/sneat-bootstrap-html-admin-template/"
  target="_blank"
  class="btn btn-danger btn-buy-now"
  >Upgrade to Pro</a
>
</div>




  @include('admin.layout.scricp')
  @yield('script')
  </body>
</html>
