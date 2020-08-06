<?php
class SeasonProvider {
    private $con, $email;

    public function __construct($con, $email) {
        $this->con = $con;
        $this->email = $email;
    }
public function create($entity){
    $seasons = $entity->getSeasons();
    if(sizeof($seasons)==0){
        return;
    }
    $seasonsHtml = "";
    foreach($seasons as $season){
        $seasonNumber=$season->getSeasonNumber();
        $videosHtml ="";
        foreach($season->getVideos() as $video){
            $videosHtml .= $this->createVideoSquare($video);
        }

        $seasonsHtml .= "<div class='season'>
                        <h3>Season $seasonNumber</h3>
                        <div class ='videos'>
                        $videosHtml
                        </div>
                        </div>";
    }
    return $seasonsHtml;


}
private function createVideoSquare($video){
$id =  $video->getID();
$thumbnail = $video->getThumbnail();
$name = $video->getTitle();
$description = $video->getDescription();
$episodeNumber = $video->getEpisodeNumber();
$hasSeen = $video->hasSeen($this->email) ?"<i class='fas fa-check-circle seen'></i>": "";
return "<a href='watch.php?id=$id'>
    <div class='episodeContainer'>
    <div class='contents'>
    <img src = '$thumbnail'>
    <div class='videoInfo'>
    <h4>$episodeNumber. $name </h4>
    <span> $description </span>
    </div>
    $hasSeen
    </div>
    </div>
    </a>";
}

}
?>