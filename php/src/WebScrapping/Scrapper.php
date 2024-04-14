<?php

namespace Chuva\Php\WebScrapping;
use Box\Spout\Writer\Common\Creator\WriterEntityFactory;
use Chuva\Php\WebScrapping\Entity\Paper;
use Chuva\Php\WebScrapping\Entity\Person;
use DOMXPath;

/**
 * Does the scrapping of a webpage.
 */
class Scrapper {

    /**
     * Loads paper information from the HTML and returns the array with the data.
     */
    public function scrap(\DOMDocument $dom): array {
        $xpath = new DOMXPath($dom);
   
        $paperNodes = $xpath->query("//a[contains(@class, 'paper-card')]");
        $papers = [];

        foreach ($paperNodes as $node) {
            $titleNode = $xpath->query(".//h4[contains(@class, 'paper-title')]", $node);
            $title = $titleNode->length > 0 ? trim($titleNode->item(0)->textContent) : '';

            $authorNodes = $xpath->query(".//div[contains(@class, 'authors')]/span", $node);
            $authors = [];
            foreach ($authorNodes as $authorNode) {
                $name = trim($authorNode->textContent);
                $institution = $authorNode->getAttribute("title");
                $authors[] = new Person($name, $institution);
            }

            $tagNodes = $xpath->query(".//div[contains(@class, 'tags') and not(contains(@class, 'flex-row'))]", $node);
            $tags = [];
            foreach ($tagNodes as $tagNode) {
                $tags[] = trim($tagNode->textContent);
            }

            $papers[] = new Paper(0, $title, $tags, $authors);
        }

        return $papers;
    }

}
