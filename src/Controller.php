<?php

namespace SON;

class Controller
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
        $this->configModel();
    }
    protected function render(array $data = [],string $view = null ){
        if (!$view){
            $view = $this->controllerName() . '/' .debug_backtrace()[1]['function'];
        }
        extract( $data );
        require __DIR__ . '/../templates/' . $view . '.tpl.php';
    }
    private function controllerName()
    {
        $class = get_class( $this );//retorna o nomespace que vai ter aquelas \
        $class = explode( '\\', $class );// transforma $class em uma array separados por \
        $class = array_pop( $class );// pega o ultimo elemento do array
        $class = preg_replace('/Controller$/', '',$class);
        return strtolower( $class );
    }
    
    private function configModel(){
        if(!$this->model->getTableName()){
            $this->model->setTableName($this->controllerName());
        }
    }
}