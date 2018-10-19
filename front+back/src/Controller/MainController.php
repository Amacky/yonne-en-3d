<?php

namespace App\Controller;

//élément permettant l'utilisation des @ Route
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Service\Recaptcha;
use App\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use \DateTime; 
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException; 
use App\Controller\ProductContoler;
// use App\Service\FileUploader;




class MainController extends Controller{
    
    
    /**
     * @Route("/", name="home")
     */
    public function index(){
      
        // dump($this->get('session')->get('account'));
        return $this->render('index.html.twig');
        
    }

    /**
     * @Route("/galerie", name="galerie")
     */
    public function galerie(){
      
        // dump($this->get('session')->get('account'));
        return $this->render('galerie.html.twig');
        
    }
     
 
   /**
    *@Route("/register", name="register")
    */
    public function register(Request $request ){ 
        
        if($this->get('session')->has('account')){
            throw new AccessDeniedHttpException();
           
         }
        //variable des request
        $email = $request->request->get('email') ?? null;
        $name = $request->request->get('name') ?? null;
        $password = $request->request->get('password') ?? null;
        $copassword = $request->request->get('confirm_password') ?? null;
        // $recaptcha = $request->request->get('g-recaptcha-response') ?? null;
       
        //On vérifie que les champs ne soient pas vide.
        if(
            isset($email)
            && isset($name)
            && isset($password)
            && isset($copassword)
            // && isset($recaptcha)        
        ){
            //verification de champs
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors[] = 'Email incorrect';
            }

            if(!preg_match('#^[a-z]{2,60}$#i', $name)){
                $errors[] = 'Nom incorrect (lettres autorisés seulement)';
            }

            if(!preg_match('#^.{2,300}$#', $password)){
                $errors[] = 'Mot de passe incorrect';
            }
            if(!preg_match('#^.{2,300}$#', $password)){
                $errors[] = 'format confirmation invalide';
            }

            if($password != $copassword){
                $errors[] = 'Confirmation invalide';
            }

            // if(!$recaptchaService->isValid($recaptcha, $request->server->get('REMOTE_ADDR'))){
            //     $errors[] = 'Recaptcha invalide';
            // }

            //si il n'y a pas d'erreurs on crée l'utilisateur.

            if(!isset($errors)){
               
                 $userRepository = $this->getDoctrine()->getRepository(User::class);
            
                 $verifUser = $userRepository->findOneByEmail($email);

                if($verifUser == false){

                    // On créer un nouvel objet
                    $user = new User();

                    // $adminLevel = 0;
                    // $token = md5(rand().time().uniqid());
                    // $remoteAdress = $request->server->get('REMOTE_ADDR');
                    // $active = 0;
                    

                    // l'objet user est aussitôt "hydraté"
                    $user->setEmail($email);
                    $user->setName($name);
                    // $user->setAdminLevel($adminLevel);
                    // $user->setActivationToken($token);
                    // $user->setActive($active);
                    $user->setPassword(password_hash($password, PASSWORD_BCRYPT)); 
                    // $user->setRegisterDate(new DateTime()); 
                    // $user->setRegisterIp($remoteAdress); 

                    // on récupère le manager
                    $entityManager = $this->getdoctrine()->getManager();

                    // on l'enregistre auprès de doctrine
                    $entityManager->persist($user);

                   // Puis on "execute" pour que tout soit enregistré dans la base de donnée.
                    $entityManager->flush();




                    //message de success
                    $success = 'Compte créé !';
                   
                } else {
                     //message d'erreur
                    $errors[] = 'Email déjà utilisé';
                }
                
            }
        }
             
        
        if(isset($errors)){
            // return $this->json( array('success' => false,'errors' => $errors ) ) ;
            return $this->render('register.html.twig', array("errors" => $errors));
        }
        
        if(isset($success)){
            // return $this->json( array('success' => true ) ) ;
            return $this->render('register.html.twig', array("success" => $success));
        }
        // return $this->json( array('success' => true ) ) ;
        return $this->render('register.html.twig');
    }

    /**
    *@Route("/profile", name="profile")
    */
    public function profile(){
        
        if(!$this->get('session')->has('account')){
            throw new AccessDeniedHttpException('Vous n\'est pas connecté');
            
        }
       
        
        return $this->render('profile.html.twig');
         
    }

   /**  
    * @Route("/activation/{id}/{token}/", name="activation", requirements={"id"="\d+", "token"="[a-fA-F0-9]{32}"}) 
    */ 
   public function activation($id, $token){ 

        // on vérifie si la personne est connecté sinon on envoie une erreur.
        if($this->get('session')->get('account')){ 
           throw new AccessDeniedHttpException('Déjà connecté');
        } 

         // Récupération du repository.
         $userRepository = $this->getDoctrine()->getRepository(User::class); 
         $user = $userRepository->findOneById($id);

        if($user && $user->getActivationToken() == $token && $user->getActive() == false){

            $user -> setActive(1); // On modifie le champ concernant l'activation 0 désactivé et 1 activé
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->flush(); 
            
            return $this->render('activation.html.twig'); 
            
        } else { 

            throw new NotFoundHttpException(); // 403 
        }
    }

 /**
     * @Route("/admin/", name="admin")
     */
    public function admin(){

        // vérification 
        if(!$this->get('session')->has('account')){
            throw new AccessDeniedHttpException('Vous n\'est pas connecté');
        }
       
        if($this->get('session')->get('account')->getAdminLevel() < 1){
            throw new AccessDeniedHttpException('Vous n\'êtes pas modérateur ou administrateur');
        }

        $mr = $this->getDoctrine()->getRepository(User::class);
        $members = $mr->findAll();

        if(!$members){
            throw new AccessDeniedHttpException('Aucun membre trouvé');
        }

        
        // Si un au moins un utilisateur est trouvé, toutes les informations est envoyé sur la page admin
        return $this->render('admin.html.twig',array('members'=>$members));

    }



     /**
    *@Route("/about", name="about")
    */
    public function about(){

      
              return $this->render('about.html.twig');
        
    }


     /**
    *@Route("/contact", name="contact")
    */
    public function contact(){

      
              return $this->render('contact.html.twig');
        
    }

     /**
    *@Route("/mentionslegales", name="mentionslegales")
    */
    public function mentionslegales(){

      
              return $this->render('mentionslegales.html.twig');
        
    }


//      /**
//     *@Route("/404", name="404")
//     */
//     public function 404(){

      
//         return $this->render('404.html.twig');
  
// }


}