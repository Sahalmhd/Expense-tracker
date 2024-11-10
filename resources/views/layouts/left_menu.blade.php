<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
           
        <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i> <!-- Dashboard icon -->
                <p>Dashboard</p>
            </a>
        </li>
        
        <li class="nav-item">
            <a href="{{ route('transactions.index') }}" class="nav-link">
                <i class="nav-icon fas fa-list"></i> <!-- Transactions icon -->
                <p>Transactions</p>
            </a>
        </li>
        
        <li class="nav-item">
            <a href="{{ route('transactions.create') }}" class="nav-link">
                <i class="nav-icon fas fa-plus"></i> <!-- Create Transaction icon -->
                <p>Add Transaction</p>
            </a>
        </li>
        
        <li class="nav-item">
            <a href="{{ route('reports.index') }}" class="nav-link ">
                <i class="nav-icon fas fa-chart-line"></i> <!-- Reports icon -->
                <p>Reports</p>
            </a>
        </li>
        
        <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="nav-icon fas fa-sign-out-alt"></i> <!-- Logout icon -->
                <p>Logout</p>
            </a>
        </li>
        
        <!-- Hidden logout form -->
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        
    </ul>
</nav>
