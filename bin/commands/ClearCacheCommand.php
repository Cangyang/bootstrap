<?php
namespace Commands;

use Phwoolcon\Cache;
use Phwoolcon\Cli\Command;
use Phwoolcon\Config;
use Phwoolcon\Db;
use Phwoolcon\I18n;
use Phwoolcon\View;
use Symfony\Component\Console\Input\InputOption;

class ClearCacheCommand extends Command
{

    protected function configure()
    {
        $this->setDefinition([
            new InputOption('config-only', 'c', InputOption::VALUE_NONE, 'Clear config cache only'),
            new InputOption('meta-only', 'm', InputOption::VALUE_NONE, 'Clear model metadata only'),
            new InputOption('locale-only', 'l', InputOption::VALUE_NONE, 'Clear locale cache only'),
            new InputOption('assets-only', 'a', InputOption::VALUE_NONE, 'Clear assets cache only'),
        ])->setDescription('Clears cache');
    }

    public function fire()
    {
        if ($this->input->getOption('config-only')) {
            Config::clearCache();
            $this->info('Config cache cleared.');
            return;
        }
        if ($this->input->getOption('meta-only')) {
            Db::clearMetadata();
            $this->info('Model metadata cleared.');
            return;
        }
        if ($this->input->getOption('locale-only')) {
            I18n::clearCache();
            $this->info('Locale cache cleared.');
            return;
        }
        if ($this->input->getOption('assets-only')) {
            View::clearAssetsCache();
            $this->info('Assets cache cleared.');
            return;
        }
        Cache::flush();
        Config::clearCache();
        $this->info('Cache cleared.');
    }
}
