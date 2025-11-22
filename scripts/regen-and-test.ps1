# PowerShell script to regenerate Composer autoload / package discovery and run basic smoke checks
# Usage: Open PowerShell at repository root and run: .\scripts\regen-and-test.ps1

param(
    [switch]$Force = $false
)

function Run-Command {
    param($cmd)
    Write-Host "Running: $cmd" -ForegroundColor Cyan
    $proc = Start-Process -FilePath 'powershell' -ArgumentList "-NoProfile", "-Command", $cmd -NoNewWindow -Wait -PassThru
    return $proc.ExitCode
}

# 1) Regenerate autoload
$exit = Run-Command 'composer dump-autoload'
if ($exit -ne 0) { Write-Error 'composer dump-autoload failed'; exit $exit }

# 2) Discover packages
$exit = Run-Command 'php artisan package:discover'
if ($exit -ne 0) { Write-Error 'php artisan package:discover failed'; exit $exit }

# 3) Ensure dependencies installed
$exit = Run-Command 'composer install'
if ($exit -ne 0) { Write-Error 'composer install failed'; exit $exit }

# 4) Run migrations (safe: not forced unless requested)
if ($Force) {
    $exit = Run-Command 'php artisan migrate --force'
} else {
    Write-Host 'Skipping migrations. Rerun with -Force to run migrations.' -ForegroundColor Yellow
}

# 5) Run test suite
$exit = Run-Command 'php artisan test'
if ($exit -ne 0) { Write-Error 'php artisan test failed'; exit $exit }

Write-Host 'Done. If you saw errors, inspect the output above.' -ForegroundColor Green
