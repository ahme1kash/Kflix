<?php
class SearchResultsProvider {
    private $con, $email;
    public function __construct($con,$email ){
        $this->con = $con;
        $this->email = $email;


    }


    public function getResults($inputText){
        $entities = EntityProvider::getSearchEntities($this->con, $inputText);
        $html = "<div class='previewCategories noScroll'>";
        $html .= $this->getResultHtml( $entities);
        return $html."</div>";
    }

    private function getResultHtml($entities){
        if(sizeof($entities)==0){
            return;
        }
            $entitiesHtml = "";
            $previewProvider = new PreviewProvider($this->con,$this->email);
    
            foreach($entities as $entity) {
                $entitiesHtml .= $previewProvider->createEntityPreviewSquare($entity);
            }
    
            return "<div class='category'>
            <div class='entities'>
            $entitiesHtml
            </div>
            </div>";
        }
    }





?>