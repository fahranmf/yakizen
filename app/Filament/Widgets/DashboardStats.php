<?php

namespace App\Filament\Widgets;

use App\Models\Category;
use App\Models\Menu;
use App\Models\Order;
use App\Models\Table;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Carbon\Carbon;

class DashboardStats extends BaseWidget
{
    protected function getStats(): array
    {
        $today = Carbon::today();

        return [
            Stat::make('Total Menu', Menu::count())
                ->description('Jumlah seluruh menu')
                ->descriptionIcon('heroicon-o-information-circle')
                ->color('success')
                ->icon('heroicon-o-clipboard-document-list'),

            Stat::make('Total Category', Category::count())
                ->description('Kategori makanan & minuman')
                ->descriptionIcon('heroicon-o-tag')
                ->color('info')
                ->icon('heroicon-o-rectangle-group'),

            Stat::make('Total Order Hari Ini', Order::whereDate('created_at', $today)->count())
                ->description('Pesanan dibuat hari ini')
                ->descriptionIcon('heroicon-o-calendar')
                ->color('primary')
                ->icon('heroicon-o-shopping-cart'),

            Stat::make('Total Order Pending Hari Ini', Order::whereDate('created_at', $today)->where('status', 'pending')->count())
                ->description('Menunggu diproses')
                ->descriptionIcon('heroicon-o-clock')
                ->color('warning')
                ->icon('heroicon-o-exclamation-triangle'),

            Stat::make('Total Order Diproses Hari Ini', Order::whereDate('created_at', $today)->where('status', 'diproses')->count())
                ->description('Sedang dimasak')
                ->descriptionIcon('heroicon-o-fire')
                ->color('info')
                ->icon('heroicon-o-adjustments-horizontal'),

            Stat::make('Total Order Selesai Hari Ini', Order::whereDate('created_at', $today)->where('status', 'selesai')->count())
                ->description('Pesanan selesai')
                ->descriptionIcon('heroicon-o-check-badge')
                ->color('success')
                ->icon('heroicon-o-check-circle'),

            Stat::make('Meja Available', Table::where('status', 'available')->count())
                ->description('Siap dipakai')
                ->descriptionIcon('heroicon-o-check')
                ->color('success')
                ->icon('heroicon-o-table-cells'),

            Stat::make('Meja Reserved', Table::where('status', 'reserved')->count())
                ->description('Sudah dipesan')
                ->descriptionIcon('heroicon-o-x-circle')
                ->color('danger')
                ->icon('heroicon-o-no-symbol'),
        ];
    }
}
