<?php

namespace Installer;

use Composer\Installer\InstallerInterface;
use Composer\Package\PackageInterface;
use Composer\Repository\InstalledRepositoryInterface;

class Custom1 implements InstallerInterface
{
		public $name = 'custom1';
		public $version = 'installer-v4';

		public function supports($packageType) {}
		public function isInstalled(InstalledRepositoryInterface $repo, PackageInterface $package) {}
		public function install(InstalledRepositoryInterface $repo, PackageInterface $package) {}
		public function update(InstalledRepositoryInterface $repo, PackageInterface $initial, PackageInterface $target) {}
		public function uninstall(InstalledRepositoryInterface $repo, PackageInterface $package) {}
		public function getInstallPath(PackageInterface $package) {}
}
