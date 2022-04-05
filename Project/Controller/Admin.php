<?php Ccc::loadClass('Controller_Admin_Action');?>
<?php 

class Controller_Admin extends Controller_Admin_Action{

    public function __construct()
    {
        if(!$this->authentication()){
            $this->redirect('login','admin_login');
        }
    }

    public function indexAction()
    {
        $this->setTitle("Admin");
        $content = $this->getLayout()->getContent();
        $adminIndex = Ccc::getBlock('Admin_Index');
        $content->addChild($adminIndex);
        $this->renderLayout();
    }

    public function gridBlockAction()
    {
        
        $adminGrid = Ccc::getBlock('Admin_Grid')->toHtml();
        $messageBlock = Ccc::getBlock('Core_Layout_Message')->toHtml();
        $response = [
            'status' => 'success',
            'elements' => [
                [
                    'element' => '#indexContent',
                    'content' => $adminGrid
                ],
                [
                    'element' => '#adminMessage',
                    'content' => $messageBlock
                ]
            ]
        ];
        $this->renderJson($response);
    }

    public function addBlockAction()
    {
        $adminModel = Ccc::getModel("Admin");
        Ccc::register('admin',$adminModel);
        $admin = $adminModel;
        // $address = $adminModel;


        $adminEdit = $this->getLayout()->getBlock('Admin_Edit')->toHtml();
        $messageBlock = Ccc::getBlock('Core_Layout_Message')->toHtml();
        $response = [
            'status' => 'success',
            'elements' => [
                [
                    'element' => '#indexContent',
                    'content' => $adminEdit
                ],
                [
                    'element' => '#adminMessage',
                    'content' => $messageBlock
                ]
            ]
        ];
        $this->renderJson($response);
        
    }
    
    public function editBlockAction()
    {
        try 
        {
            $this->setTitle('Admin Edit');
            $adminModel = Ccc::getModel('Admin');
            $request = $this->getRequest();
            $id = (int)$request->getRequest('id');

            if(!$id)
            {
                throw new Exception("Invalid Request", 1);
            }

            $admin = $adminModel->load($id);
            if(!$admin)
            {
                throw new Exception("System is unable to find record.", 1);
                
            }
            Ccc::register('admin',$admin);

            $adminEdit = Ccc::getBlock('Admin_Edit')->toHtml();
            $messageBlock = Ccc::getBlock('Core_Layout_Message')->toHtml();
            $response = [
                'status' => 'success',
                'elements' => [
                    [
                        'element' => '#indexContent',
                        'content' => $adminEdit
                    ],
                    [
                        'element' => '#adminMessage',
                        'content' => $messageBlock
                    ]
                ]
            ];
            $this->renderJson($response);
        }    
        catch (Exception $e) 
        {
            $this->getMessage()->addMessage($e->getMessage(),3);
            $this->gridBlockAction();
        }
    }


    public function deleteAction()
    {
        
        try
        {
            $adminModel = Ccc::getModel('Admin');
            $request=$this->getRequest();

            if(!$request->getRequest('id'))
            {
                $this->getMessage()->addMessage('unable to delete.',3);
                throw new Exception("Invelid Request", 1);
                
            }
            $adminId = $request->getRequest('id');

            if(!$adminId)
            {
                throw new Exception("Unable to fetch ID.");
            }
            $result = $adminModel->load($adminId);
            if(!$result)
            {
                throw new Exception("Unable to Delete Record.");
            }
            $result->delete();
            $message = $this->getMessage()->addMessage('Data Deleted.');
            $this->gridBlockAction();
           /* $id=$request->getRequest('id');
            $adminId=$adminModel->load($id)->delete();
            $this->getMessage()->addMessage('data deleted succesfully.',1);
            $this->gridBlockAction();*/

        }
        catch(Exception $e)
        {
           $message = $this->getMessage()->addMessage($e->getMessage(),3);
            $this->gridBlockAction();
        }
    }

/*    public function saveAction()
    {
        try
        {
            $adminModel = Ccc::getModel('Admin');
            $request = $this->getRequest();

            if(!$request->isPost())
            {
                throw new Exception("Request Invalid.");
            }

            $postData = $request->getPost('admin');

            if(!$postData)
            {
                throw new Exception("Invalid data Posted.");
            }

            $admin = $adminModel;
            $admin->setData($postData);

            if(!($admin->adminId))
            {
            
                unset($admin->adminId);
                $admin->createdAt= date('y-m-d h:m:s');
                $admin->password = md5($admin->password);
            }
            else
            {

                if(!(int)$admin->adminId)
                {
                    throw new Exception("Invalid Request.");
                }
                $admin->updatedAt = date('y-m-d h:m:s');
               
            }
            $result = $admin->save();
            if(!$result)
            {
                throw new Exception("Unable to Save Record.");
            }
            $message = $this->getMessage()->addMessage('Your Data save Successfully');
            $this->gridBlockAction();
        }
        catch (Exception $e)
        {
            $message = $this->getMessage()->addMessage($e->getMessage(),3);
            $this->gridBlockAction();
        }
    }*/

    public function saveAction()
    {
        try
        {
            
            $request=$this->getRequest();
            $adminModel= Ccc::getModel('Admin');
            if(!$request->isPost())
            {
                throw new Exception("Request Invalid.",1);
            }
            $postData=$request->getPost('admin');
            if(!$postData)
            {
                throw new Exception("Invalid data Posted.", 1);
                
            }
            $admin=$adminModel;
            $admin->setData($postData);
            /*print_r($postData);
            exit();*/

            if(!($admin->adminId))
            {
                unset($admin->adminId);
                $admin->createdAt = date('y-m-d h:m:s');
            }
            else
            {

                unset($admin->password);
                if(!(int)$admin->adminId)
                {
                    throw new Exception("Invalid Request.",1);
                }
                $admin->updatedAt = date('y-m-d h:m:s');
            }

            $result=$admin->save();
            if(!$result)
            {
                $this->getMessage()->addMessage('Unable to inserted.',3);
                throw new Exception("Unable to save Record.", 1);
                
            }   
            $this->getMessage()->addMessage('Data save succesfully',1);
            $this->gridBlockAction();
        } 
        catch (Exception $e) 
        {
            $message = $this->getMessage()->addMessage($e->getMessage(),3);
            $this->gridBlockAction();
        }
    }

}


?>