<?php namespace October\Test\ReportWidgets;

use Backend\Classes\ReportWidgetBase;
use October\Test\Models\User;

class PostStats extends ReportWidgetBase {


    public $listWidget;

    public $alias = 'postStats';

    public function init()
    {
        $this->initListWidget();
        $this->initUserList();
   
    }

    public function render()
    {    
        return $this->makePartial('widget');
    }

    public function renderListWidget()
    {
        return $this->listWidget->render();
    }

    public function loadAssets()
    {
        $this->addJs('js/poststats.js');
        $this->addCss('css/poststats.css');
    }

    public function defineProperties()
    {
        return [
            'user' => [
                'title' => 'user',
                'type' => 'dropdown'
            ]
        ];
    }

    public function getUserOptions()
    {
        return [null => 'Select an user'] + User::lists('username', 'id');
    }

    public function onView()
    {
        $role = User::find(post('roleId'));
        return $this->makePartial('popup', compact('role'));
    }

    private function initListWidget()
    {
        $listConfig = $this->makeConfig('~/plugins/october/test/reportwidgets/poststats/config_list.yaml');

        /*
         * Create the model
         */
        $class = $listConfig->modelClass;
        $model = new $class();

        /*
         * Prepare the list widget
         */
        $columnConfig = $this->makeConfig($listConfig->list);
        $columnConfig->model = $model;
        $columnConfig->alias = 'postStatsList';
        $columnConfig->noRecordsMessage = $listConfig->noRecordsMessage;
        $columnConfig->recordsPerPage = $listConfig->recordsPerPage;
        $columnConfig->readOnly = $listConfig->readOnly;
        $columnConfig->recordOnClick = $listConfig->recordOnClick;;

        $listWidget = $this->makeWidget('Backend\Widgets\Lists', $columnConfig);
        $listWidget->bindToController();
        $this->listWidget = $listWidget;

        
    }

    private function initUserList()
    {
        $listConfig = $this->makeConfig('~/plugins/october/test/reportwidgets/poststats/config_user_list.yaml');

        /*
         * Create the model
         */
        $class = $listConfig->modelClass;
        $model = new $class();

        /*
         * Prepare the list widget
         */
        $columnConfig = $this->makeConfig($listConfig->list);
        $columnConfig->model = $model;
        $columnConfig->alias = 'postStatsUserList';
        $columnConfig->noRecordsMessage = $listConfig->noRecordsMessage;
        $columnConfig->recordsPerPage = $listConfig->recordsPerPage;
        $columnConfig->readOnly = $listConfig->readOnly;

        $userList = $this->makeWidget('Backend\Widgets\Lists', $columnConfig);
        $userList->bindToController();
        $this->userList = $userList;
    }
}