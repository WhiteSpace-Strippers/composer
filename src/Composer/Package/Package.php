<?php

/*
 * This file is part of Composer.
 *
 * (c) Nils Adermann <naderman@naderman.de>
 *		 Jordi Boggiano <j.boggiano@seld.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Composer\Package;

use Composer\Package\Version\VersionParser;

/**
 * Core package definitions that are needed to resolve dependencies and install packages
 *
 * @author Nils Adermann <naderman@naderman.de>
 */
class Package extends BasePackage
{
		protected $type;
		protected $targetDir;
		protected $installationSource;
		protected $sourceType;
		protected $sourceUrl;
		protected $sourceReference;
		protected $distType;
		protected $distUrl;
		protected $distReference;
		protected $distSha1Checksum;
		protected $version;
		protected $prettyVersion;
		protected $releaseDate;
		protected $extra = array();
		protected $binaries = array();
		protected $aliases = array();
		protected $alias;
		protected $prettyAlias;
		protected $dev;
		protected $stability;
		protected $notificationUrl;

		protected $requires = array();
		protected $conflicts = array();
		protected $provides = array();
		protected $replaces = array();
		protected $devRequires = array();
		protected $suggests = array();
		protected $autoload = array();
		protected $includePaths = array();

		/**
		 * Creates a new in memory package.
		 *
		 * @param string $name					The package's name
		 * @param string $version			 The package's version
		 * @param string $prettyVersion The package's non-normalized version
		 */
		public function __construct($name, $version, $prettyVersion)
		{
				parent::__construct($name);

				$this->version = $version;
				$this->prettyVersion = $prettyVersion;

				$this->stability = VersionParser::parseStability($version);
				$this->dev = $this->stability === 'dev';
		}

		/**
		 * {@inheritDoc}
		 */
		public function isDev()
		{
				return $this->dev;
		}

		/**
		 * @param string $type
		 */
		public function setType($type)
		{
				$this->type = $type;
		}

		/**
		 * {@inheritDoc}
		 */
		public function getType()
		{
				return $this->type ?: 'library';
		}

		/**
		 * {@inheritDoc}
		 */
		public function getStability()
		{
				return $this->stability;
		}

		/**
		 * @param string $targetDir
		 */
		public function setTargetDir($targetDir)
		{
				$this->targetDir = $targetDir;
		}

		/**
		 * {@inheritDoc}
		 */
		public function getTargetDir()
		{
				if (null === $this->targetDir) {
						return;
				}

				return ltrim(preg_replace('{ (?:^|[\\\\/]+) \.\.? (?:[\\\\/]+|$) (?:\.\.? (?:[\\\\/]+|$) )*}x', '/', $this->targetDir), '/');
		}

		/**
		 * @param array $extra
		 */
		public function setExtra(array $extra)
		{
				$this->extra = $extra;
		}

		/**
		 * {@inheritDoc}
		 */
		public function getExtra()
		{
				return $this->extra;
		}

		/**
		 * @param array $binaries
		 */
		public function setBinaries(array $binaries)
		{
				$this->binaries = $binaries;
		}

		/**
		 * {@inheritDoc}
		 */
		public function getBinaries()
		{
				return $this->binaries;
		}

		/**
		 * @param array $aliases
		 */
		public function setAliases(array $aliases)
		{
				$this->aliases = $aliases;
		}

		/**
		 * {@inheritDoc}
		 */
		public function getAliases()
		{
				return $this->aliases;
		}

		/**
		 * @param string $alias
		 */
		public function setAlias($alias)
		{
				$this->alias = $alias;
		}

		/**
		 * {@inheritDoc}
		 */
		public function getAlias()
		{
				return $this->alias;
		}

		/**
		 * @param string $prettyAlias
		 */
		public function setPrettyAlias($prettyAlias)
		{
				$this->prettyAlias = $prettyAlias;
		}

		/**
		 * {@inheritDoc}
		 */
		public function getPrettyAlias()
		{
				return $this->prettyAlias;
		}

		/**
		 * {@inheritDoc}
		 */
		public function setInstallationSource($type)
		{
				$this->installationSource = $type;
		}

		/**
		 * {@inheritDoc}
		 */
		public function getInstallationSource()
		{
				return $this->installationSource;
		}

		/**
		 * @param string $type
		 */
		public function setSourceType($type)
		{
				$this->sourceType = $type;
		}

		/**
		 * {@inheritDoc}
		 */
		public function getSourceType()
		{
				return $this->sourceType;
		}

		/**
		 * @param string $url
		 */
		public function setSourceUrl($url)
		{
				$this->sourceUrl = $url;
		}

		/**
		 * {@inheritDoc}
		 */
		public function getSourceUrl()
		{
				return $this->sourceUrl;
		}

		/**
		 * @param string $reference
		 */
		public function setSourceReference($reference)
		{
				$this->sourceReference = $reference;
		}

		/**
		 * {@inheritDoc}
		 */
		public function getSourceReference()
		{
				return $this->sourceReference;
		}

		/**
		 * @param string $type
		 */
		public function setDistType($type)
		{
				$this->distType = $type;
		}

		/**
		 * {@inheritDoc}
		 */
		public function getDistType()
		{
				return $this->distType;
		}

		/**
		 * @param string $url
		 */
		public function setDistUrl($url)
		{
				$this->distUrl = $url;
		}

		/**
		 * {@inheritDoc}
		 */
		public function getDistUrl()
		{
				return $this->distUrl;
		}

		/**
		 * @param string $reference
		 */
		public function setDistReference($reference)
		{
				$this->distReference = $reference;
		}

		/**
		 * {@inheritDoc}
		 */
		public function getDistReference()
		{
				return $this->distReference;
		}

		/**
		 * @param string $sha1checksum
		 */
		public function setDistSha1Checksum($sha1checksum)
		{
				$this->distSha1Checksum = $sha1checksum;
		}

		/**
		 * {@inheritDoc}
		 */
		public function getDistSha1Checksum()
		{
				return $this->distSha1Checksum;
		}

		/**
		 * {@inheritDoc}
		 */
		public function getVersion()
		{
				return $this->version;
		}

		/**
		 * {@inheritDoc}
		 */
		public function getPrettyVersion()
		{
				return $this->prettyVersion;
		}

		/**
		 * Set the releaseDate
		 *
		 * @param DateTime $releaseDate
		 */
		public function setReleaseDate(\DateTime $releaseDate)
		{
				$this->releaseDate = $releaseDate;
		}

		/**
		 * {@inheritDoc}
		 */
		public function getReleaseDate()
		{
				return $this->releaseDate;
		}

		/**
		 * Set the required packages
		 *
		 * @param array $requires A set of package links
		 */
		public function setRequires(array $requires)
		{
				$this->requires = $requires;
		}

		/**
		 * {@inheritDoc}
		 */
		public function getRequires()
		{
				return $this->requires;
		}

		/**
		 * Set the conflicting packages
		 *
		 * @param array $conflicts A set of package links
		 */
		public function setConflicts(array $conflicts)
		{
				$this->conflicts = $conflicts;
		}

		/**
		 * {@inheritDoc}
		 */
		public function getConflicts()
		{
				return $this->conflicts;
		}

		/**
		 * Set the provided virtual packages
		 *
		 * @param array $provides A set of package links
		 */
		public function setProvides(array $provides)
		{
				$this->provides = $provides;
		}

		/**
		 * {@inheritDoc}
		 */
		public function getProvides()
		{
				return $this->provides;
		}

		/**
		 * Set the packages this one replaces
		 *
		 * @param array $replaces A set of package links
		 */
		public function setReplaces(array $replaces)
		{
				$this->replaces = $replaces;
		}

		/**
		 * {@inheritDoc}
		 */
		public function getReplaces()
		{
				return $this->replaces;
		}

		/**
		 * Set the recommended packages
		 *
		 * @param array $devRequires A set of package links
		 */
		public function setDevRequires(array $devRequires)
		{
				$this->devRequires = $devRequires;
		}

		/**
		 * {@inheritDoc}
		 */
		public function getDevRequires()
		{
				return $this->devRequires;
		}

		/**
		 * Set the suggested packages
		 *
		 * @param array $suggests A set of package names/comments
		 */
		public function setSuggests(array $suggests)
		{
				$this->suggests = $suggests;
		}

		/**
		 * {@inheritDoc}
		 */
		public function getSuggests()
		{
				return $this->suggests;
		}

		/**
		 * Set the autoload mapping
		 *
		 * @param array $autoload Mapping of autoloading rules
		 */
		public function setAutoload(array $autoload)
		{
				$this->autoload = $autoload;
		}

		/**
		 * {@inheritDoc}
		 */
		public function getAutoload()
		{
				return $this->autoload;
		}

		/**
		 * Sets the list of paths added to PHP's include path.
		 *
		 * @param array $includePaths List of directories.
		 */
		public function setIncludePaths(array $includePaths)
		{
				$this->includePaths = $includePaths;
		}

		/**
		 * {@inheritDoc}
		 */
		public function getIncludePaths()
		{
				return $this->includePaths;
		}

		/**
		 * Sets the notification URL
		 *
		 * @param string $notificationUrl
		 */
		public function setNotificationUrl($notificationUrl)
		{
				$this->notificationUrl = $notificationUrl;
		}

		/**
		 * {@inheritDoc}
		 */
		public function getNotificationUrl()
		{
				return $this->notificationUrl;
		}
}
