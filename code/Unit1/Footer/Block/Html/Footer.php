<?php


namespace Unit1\Footer\Block\Html;


class Footer extends \Magento\Theme\Block\Html\Footer
{
    //overridear esta funcion que devuelve el disenio del footer
    public function getCopyright()
    {
        //para ver que llama a el disenio
       // if (!$this->_copyright) {
         //   $this->_copyright = $this->_scopeConfig->getValue(
        //        'design/footer/copyright',
          //      \Magento\Store\Model\ScopeInterface::SCOPE_STORE
          //  );
       // }
       // return __($this->_copyright)."te aumentara algqui ahi";


        //llama a la funcion padre getCopyright(); y le dice que aumemnte "hello word"
        //lo mismo que arriba.
        $res = parent::getCopyright();
        //return $res . " Hello World!";
        return "{$res} Hello World!";
    }
}
