<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Fungsi untuk mendapatkan nama hari dalam bahasa Indonesia
 * @return string Nama hari dalam bahasa Indonesia
 */
function hari_ini()
{
    $hari_mapping = [
        'Sun' => 'Minggu',
        'Mon' => 'Senin', 
        'Tue' => 'Selasa',
        'Wed' => 'Rabu',
        'Thu' => 'Kamis',
        'Fri' => 'Jumat',  // Fixed: Removed escape character
        'Sat' => 'Sabtu'
    ];
    
    return $hari_mapping[date('D')] ?? 'Hari tidak diketahui';
}

/**
 * Fungsi untuk mendapatkan tanggal dalam format Indonesia
 * @return string Tanggal dalam format Indonesia (dd Bulan yyyy)
 */
function tanggal_indo()
{
    $bulan = [
        1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
    ];
    
    $tanggal = date('j');      // Tanggal tanpa leading zero
    $bulan_ini = (int)date('n'); // Bulan tanpa leading zero
    $tahun = date('Y');        // Tahun 4 digit
    
    return $tanggal . ' ' . $bulan[$bulan_ini] . ' ' . $tahun;
}

/**
 * Fungsi untuk mendapatkan sapaan berdasarkan waktu
 * @return string Sapaan yang sesuai dengan waktu
 */
function sapaan_waktu()
{
    $jam = (int)date('H');
    
    if ($jam >= 5 && $jam < 11) {
        return 'Selamat Pagi';
    } elseif ($jam >= 11 && $jam < 15) {
        return 'Selamat Siang';
    } elseif ($jam >= 15 && $jam < 18) {
        return 'Selamat Sore';
    } else {
        return 'Selamat Malam';
    }
}

/**
 * Fungsi untuk mendapatkan icon berdasarkan level user
 * @param string $level Level user
 * @return string Icon class
 */
function get_level_icon($level)
{
    $icons = [
        'admin' => 'fas fa-user-shield',
        'operator' => 'fas fa-user-cog',
        'kasir' => 'fas fa-cash-register',
        'apoteker' => 'fas fa-user-md',
        'dokter' => 'fas fa-stethoscope'
    ];
    
    return $icons[strtolower($level)] ?? 'fas fa-user';
}

/**
 * Fungsi untuk mendapatkan badge color berdasarkan level
 * @param string $level Level user
 * @return string Bootstrap badge class
 */
function get_level_badge($level)
{
    $badges = [
        'admin' => 'badge-danger',
        'operator' => 'badge-primary',
        'kasir' => 'badge-success',
        'apoteker' => 'badge-info',
        'dokter' => 'badge-warning'
    ];
    
    return $badges[strtolower($level)] ?? 'badge-secondary';
}
?>

<!-- Enhanced Dashboard Header -->
<div class="dashboard-header mb-4">
    <div class="card shadow-sm border-0">
        <div class="card-body p-4">
            <!-- Header dengan Gradient Background -->
            <div class="welcome-banner p-4 mb-4 rounded-lg" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <div class="welcome-content">
                            <div class="d-flex align-items-center mb-2">
                                <div class="clinic-icon mr-3">
                                    <i class="fas fa-hospital-symbol fa-2x text-white opacity-90"></i>
                                </div>
                                <div>
                                    <h2 class="mb-1 font-weight-bold">
                                        <?= sapaan_waktu(); ?>! 👋
                                    </h2>
                                    <h4 class="mb-0 opacity-90">
                                        Sistem Manajemen Stok Obat
                                    </h4>
                                </div>
                            </div>
                            <h1 class="clinic-name mb-0">
                                <i class="fas fa-clinic-medical mr-2"></i>
                                Klinik Nur Cahaya
                            </h1>
                        </div>
                    </div>
                    
                    <div class="col-md-4 text-md-right">
                        <div class="datetime-display bg-white bg-opacity-20 rounded-lg p-3">
                            <div class="current-time mb-2">
                                <i class="fas fa-clock mr-2"></i>
                                <span class="time-text" id="current-time"></span>
                            </div>
                            <div class="current-date">
                                <i class="fas fa-calendar-alt mr-2"></i>
                                <strong><?= hari_ini(); ?>, <?= tanggal_indo(); ?></strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- User Information Section -->
            <div class="user-info-section">
                <div class="row">
                    <div class="col-md-6">
                        <div class="user-card bg-light rounded-lg p-3">
                            <div class="d-flex align-items-center">
                                <div class="user-avatar bg-primary rounded-circle d-flex align-items-center justify-content-center mr-3" style="width: 50px; height: 50px;">
                                    <i class="<?= get_level_icon($this->session->userdata('level')); ?> text-white fa-lg"></i>
                                </div>
                                <div class="user-details">
                                    <h6 class="mb-1 font-weight-bold text-dark">
                                        <?= htmlspecialchars($this->session->userdata('User')); ?>
                                    </h6>
                                    <div class="user-level">
                                        <span class="badge <?= get_level_badge($this->session->userdata('level')); ?> px-3 py-1">
                                            <i class="fas fa-shield-alt mr-1"></i>
                                            <?= ucfirst(htmlspecialchars($this->session->userdata('level'))); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="session-info bg-light rounded-lg p-3">
                            <div class="row text-center">
                                <div class="col-6">
                                    <div class="session-stat">
                                        <i class="fas fa-sign-in-alt text-success mb-1"></i>
                                        <div class="stat-value">
                                            <small class="text-muted d-block">Login Terakhir</small>
                                            <strong><?= date('H:i') ?></strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="session-stat">
                                        <i class="fas fa-eye text-info mb-1"></i>
                                        <div class="stat-value">
                                            <small class="text-muted d-block">Status</small>
                                            <strong class="text-success">Online</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  

            <!-- Quick Actions -->
            <div class="quick-actions mt-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6 class="mb-0 font-weight-bold">
                        <i class="fas fa-bolt text-warning mr-2"></i>
                        Akses Cepat
                    </h6>
                    <small class="text-muted">Navigasi yang sering digunakan</small>
                </div>
                
                <div class="row">
                    <div class="col-md-3 col-6 mb-2">
                         <a href="<?=site_url('barang'); ?>" class="quick-action-btn btn btn-outline-success btn-sm btn-block">Stok Obat</a>
                           
                        
                    </div>
                    <div class="col-md-3 col-6 mb-2">
                        <a href="<?=site_url('tambah_penjualan'); ?>" class="quick-action-btn btn btn-outline-success btn-sm btn-block">Transaksi</a>
                           
                        
                    </div>
                    <div class="col-md-3 col-6 mb-2">
                         <a href="<?=site_url('penjualan_harian'); ?>" class="quick-action-btn btn btn-outline-success btn-sm btn-block">Laporan</a>
                        </a>
                    </div>
                    <div class="col-md-3 col-6 mb-2">
                         <a href="<?=site_url('admin'); ?>" class="quick-action-btn btn btn-outline-success btn-sm btn-block">Pengaturan</a>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Custom CSS -->
<style>
.dashboard-header .card {
    border-radius: 15px;
    overflow: hidden;
}

.welcome-banner {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 12px !important;
    position: relative;
    overflow: hidden;
}

.welcome-banner::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="50" cy="50" r="0.5" fill="white" opacity="0.1"/></pattern></defs><rect width="100%" height="100%" fill="url(%23grain)"/></svg>');
    pointer-events: none;
}

.clinic-name {
    font-size: 2rem;
    text-shadow: 0 2px 4px rgba(0,0,0,0.2);
}

.datetime-display {
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255,255,255,0.2);
}

.time-text {
    font-family: 'Courier New', monospace;
    font-weight: bold;
    font-size: 1.1rem;
}

.user-card, .session-info {
    border: 1px solid #1962acff;
    transition: all 0.3s ease;
   background: linear-gradient(135deg, #7a87faff 0%, #dbd9ddff 100%);
}

.user-card:hover, .session-info:hover {
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    transform: translateY(-2px);
}

.user-avatar {
    background: linear-gradient(135deg, #007bff 0%, #6610f2 100%);
}

.quick-action-btn {
    transition: all 0.3s ease;
    pointer-events : auto;
    padding : 20px;
    display : block;
    border-radius: 8px;
    font-size: 0.85rem;
}

.quick-action-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
}

.bg-opacity-20 {
    background-color: rgba(255,255,255,0.2) !important;
}

.opacity-90 {
    opacity: 0.9;
}

.session-stat i {
    font-size: 1.2rem;
}

.rounded-lg {
    border-radius: 10px;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .clinic-name {
        font-size: 1.5rem;
    }
    
    .datetime-display {
        text-align: center;
        margin-top: 1rem;
    }
    
    .user-info-section .col-md-6 {
        margin-bottom: 1rem;
    }
}

/* Animation for time */
@keyframes pulse {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.7; }
}

.time-text {
    animation: pulse 2s infinite;
}
</style>

<!-- JavaScript for Real-time Clock -->
<script>
function updateTime() {
    const now = new Date();
    const timeString = now.toLocaleTimeString('id-ID', { 
        hour: '2-digit', 
        minute: '2-digit', 
        second: '2-digit' 
    });
    
    const timeElement = document.getElementById('current-time');
    if (timeElement) {
        timeElement.textContent = timeString;
    }
}

// Update time immediately and then every second
updateTime();
setInterval(updateTime, 1000);

// Add some interactive effects
document.addEventListener('DOMContentLoaded', function() {
    // Hover effects for quick action buttons
    const quickActionBtns = document.querySelectorAll('.quick-action-btn');
    quickActionBtns.forEach(btn => {
        btn.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px) scale(1.02)';
        });
        
        btn.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
    });
});
</script>