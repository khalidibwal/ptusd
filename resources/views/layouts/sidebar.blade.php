<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('user.png') }} " class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ \Auth::user()->name  }}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>



        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">HEADER</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{ url('/home') }}"><i class="fa fa-link"></i> <span>Dashboard</span></a></li>
            <li class="active"><a href="{{ route('chat.index') }}"><i class="fa fa-link"></i> <span>Chat</span></a></li>
            <li class="active"><a href="{{ route('categories.index') }}"><i class="fa fa-link"></i> <span>Category</span></a></li>
            <li class="active"><a href="{{ route('products.index') }}"><i class="fa fa-link"></i> <span>Product</span></a></li>
            <li class="active"><a href="{{ route('customers.index') }}"><i class="fa fa-link"></i> <span>Customer</span></a></li>
            <!-- <li class="active"><a href="{{ route('sales.index') }}"><i class="fa fa-link"></i> <span>Sales</span></a></li> -->
            <li class="active"><a href="{{ route('suppliers.index') }}"><i class="fa fa-link"></i> <span>Supplier</span></a></li>
            <!-- <li class="active"><a href="{{ route('productsOut.index') }}"><i class="fa fa-link"></i> <span>Reporting Data Out</span></a></li> -->
            <li class="active"><a href="{{ route('productsIn.index') }}"><i class="fa fa-link"></i> <span>Reporting Data</span></a></li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
