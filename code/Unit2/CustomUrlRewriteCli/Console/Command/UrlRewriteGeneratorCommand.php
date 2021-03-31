<?php

namespace Unit2\CustomUrlRewriteCli\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class UrlRewriteGeneratorCommand extends Command
{

    /**
     * @var \Magento\UrlRewrite\Model\UrlRewriteFactory
     */
    private $urlRewriteFactory;

    public function __construct(
        \Magento\UrlRewrite\Model\UrlRewriteFactory $urlRewriteFactory,
        string $name = null)
{

    parent::__construct($name);
    $this->urlRewriteFactory = $urlRewriteFactory;
}

    /**
     * @inheritDoc
     */
    protected function configure()
    {
        $this->setName('unit2:urlrewritegenerator');
        $this->setDescription('UrlRewriteGeneratorCommand');
        parent::configure();
    }

    /**
     * CLI command description
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return void
     */
    protected function execute(InputInterface $input, OutputInterface $output): void
    {
        $rewriteList=[
            //'rewrite'=> 'fullActionPath'
            'custom-page-page.html'=> 'resultdemo/demo/page',
            'custom-page-json.html'=> 'resultdemo/demo/json',
            'custom-page-raw.html'=> 'resultdemo/demo/raw',
            'custom-page-redirect.html'=> 'resultdemo/demo/redirect',
            'custom-page-forward.html'=> 'resultdemo/demo/forward'
         ];
        foreach ($rewriteList as $requestUrl => $targetUrl){
            /**
             * @var \Magento\UrlRewrite\Model\UrlRewrite $urlRewrite */
            $urlRewrite=$this->urlRewriteFactory->create();
            $urlRewrite->setEntityType('custom')
                ->setRequestPath($requestUrl)
                ->setTargetPath($targetUrl)
                ->setStoreId(1);
            $urlRewrite->save();

            $output->writeln($requestUrl);
        }
        $output->writeln("DONE..!! HAHA");
    }
}
