<?php
namespace Bazaarvoice\Connector\Controller\Adminhtml\Bvfeed;

use Bazaarvoice\Connector\Model\Indexer\Flat;
use Magento\Backend\App\Action\Context;

class Rebuildproduct extends \Magento\Backend\App\Action
{

    /** @var  Flat $indexer */
    protected $indexer;

    /**
     * Runproduct constructor.
     * @param Context $context
     * @param Flat $indexer
     */
    public function __construct(Context $context, Flat $indexer)
    {
        parent::__construct($context);
        $this->indexer = $indexer;
    }

    public function execute()
    {
        $result = $this->indexer->executeFull();
        if($result)
            $this->messageManager->addSuccess(__('Product Feed Index has been flagged for rebuild.'));

        $this->_redirect('adminhtml/bvindex/index');
    }
}