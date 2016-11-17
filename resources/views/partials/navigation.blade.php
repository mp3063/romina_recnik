<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#topFixedNavbar1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="topFixedNavbar1">
                <ul class="nav navbar-nav">
                    <li><a href="/">Home</a></li>
                    <li><a href="#" data-toggle="modal" data-target="#myModal1">New Dictionary</a></li>
                    <li><a href="#" data-toggle="modal" data-target="#myModal">Insert</a></li>
                </ul>
                <form action="{{URL::to('/search')}}" class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                        <input type="text" name="search" class="form-control" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default">Search</button>
                </form>

            </div>

            <!-- /.navbar-collapse -->
        </div>
        <div class="nav navbar-right">
            <ul class="nav navbar-nav">
                <li><a href="/auth/logout">Logout</a></li>
            </ul>
        </div>
        <!-- /.container-fluid -->
    </div>
</nav>

