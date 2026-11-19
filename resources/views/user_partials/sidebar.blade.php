<div class="sidebar-overlay" id="sidebarOverlay"></div>

    <aside class="sidebar" id="sidebar" aria-label="Navigasi utama">
        <div class="brand">
            <span class="brand-icon">⌂</span>
            <span class="brand-text">Omah Amah</span>
        </div>

        <div class="menu-label">MENU UTAMA</div>

        <nav class="sidebar-nav">
            
             <a href="{{ route('user.dashboard') }}"
                class="menu-link sidebar-link {{ request()->is('user/dashboard') ? 'active' : '' }}"
                title="Dashboard">
                    <i class="bi bi-grid menu-icon"></i>
                    <span class="menu-text">Dashboard</span>
                </a>
            
                <a href="{{ route('user.inform') }}"
                class="menu-link sidebar-link {{ request()->is('user/informasi-kost') ? 'active' : '' }}"
                title="Informasi Kost">
                    <i class="bi bi-info-circle menu-icon"></i>
                    <span class="menu-text">Informasi Kost</span>
                </a>


            <a href="{{ route('user.rooms') }}"
                class="menu-link {{ request()->is('user/rooms') ? 'active' : '' }}"
                title="Kamar dan Fasilitas">

                    <span class="menu-icon">
                        <i class="bi bi-house-door"></i>
                    </span>

                    <span class="menu-text">Kamar dan Fasilitas</span>
                </a>

            <a href="{{ url('/user/chatbot') }}"
                class="menu-link {{ request()->is('user/chatbot') ? 'active' : '' }}"
                title="Chatbot">
                    <span class="menu-icon">
                        <i class="bi bi-robot"></i>
                    </span>
                    <span class="menu-text">Chatbot</span>
                </a>

            <a href="{{ url('/') }}" class="menu-link" title="Keluar" id="logoutBtn">
    <span class="menu-icon">↪</span>
    <span class="menu-text">Keluar</span>
</a>
        </nav>
    </aside>
