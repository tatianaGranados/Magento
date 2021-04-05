<?php


namespace Unit3\BlockTemplate\Controller\Index;


use Magento\Framework\App\Action\Action;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultFactory;

class Index extends Action
{

    public function execute()
    {
        $pageResult= $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $layout = $pageResult->getLayout();

        //uso por defecto del bloque que viene con magento $templateBlock
        // y le asigno un template helloworld de /frontend/templates
        //** @var \Magento\Framework\View\Element\Template $templateBlock */
        //$templateBlock =$layout ->createBlock(\Magento\Framework\View\Element\Template::class);
        //1° le asigno el template vendor_modulo::nombre del template.phtml
        //$templateBlock->setTemplate('Unit3_BlockTemplate::helloworld.phtml');
        //2° validar si ya contengo el valor del bloque
        //echo $templateBlock->toHtml(); die;


        //para personalizar mas me creo mi propio bloque
        /** @var \Unit3\BlockTemplate\Block\HelloBlock $helloWorldBlock */
        //1° llamo a la clase de mi bloque creado en block
        $helloWorldBlock= $layout->createBlock(\Unit3\BlockTemplate\Block\HelloBlock::class);
        //2° le asigno una vista que me cree en custom
        $helloWorldBlock->setTemplate('Unit3_BlockTemplate::custom/hello.phtml');
        //3° validar si ya contengo el valor del bloque
        //echo $helloWorldBlock->toHtml(); die;

        //si queremos devolverlo como ram toHtml()
        $out= $helloWorldBlock->toHtml();
        $rawResult =$this->resultFactory->create(ResultFactory::TYPE_RAW);
        return $rawResult->setContents($out);

    }
}
