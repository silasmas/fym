<?php

namespace App\Providers\Filament;

use Filament\Pages;
use Filament\Panel;
use Filament\Widgets;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Pages\Auth\EditProfile;
use Illuminate\Support\Facades\Auth;
use Filament\Http\Middleware\Authenticate;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Filament\Http\Middleware\AuthenticateSession;
use BezhanSalleh\FilamentShield\FilamentShieldPlugin;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
                ->colors([
                    'primary' => '#3B4D2A',   // Vert olive foncé (dominant du logo)
                    'info'    => '#6A9E4A',   // Vert feuille (plus clair pour "info")
                    'success' => '#4CAF50',   // Vert succès (standard, proche feuille saine)
                    'warning' => '#E0A800',   // Jaune-orangé terreux (avertissement naturel)
                    'danger'  => '#C0392B',   // Rouge profond (contraste pour erreurs)
                    'gray'    => '#6B7280',   // Gris neutre (texte/secondaire)
                ])
             ->passwordReset()
        ->emailVerification()
        ->profile(EditProfile::class)
            ->colors([
                'primary' => "#3B4D2A",
            ])
            ->authGuard('web')
            ->unsavedChangesAlerts()
            ->brandName('Dashboard FYM')
            ->brandLogo(asset('assets/images/logo.jpeg'))
            ->brandLogoHeight(fn() => Auth::check() ? '3rem' : '5rem')
            ->favicon(asset('assets/images/logo.jpeg'))
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])->plugins([
            FilamentShieldPlugin::make(),
        ]);
    }
}
