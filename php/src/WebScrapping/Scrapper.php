<?php

namespace Chuva\Php\WebScrapping;

use Box\Spout\Writer\Common\Creator\WriterEntityFactory;
use Box\Spout\Writer\Common\Creator\Style\StyleBuilder;
use Box\Spout\Writer\Common\Creator\Style\BorderBuilder;
use Box\Spout\Common\Entity\Style\CellAlignment;
use Box\Spout\Common\Entity\Style\Border;
use Box\Spout\Common\Entity\Style\Color;
use Chuva\Php\WebScrapping\Entity\Paper;
use Chuva\Php\WebScrapping\Entity\Person;

use DOMXPath;

/**
 * Does the scraping of a webpage and writes the data into a XLSX file.
 */
class Scrapper {

    /**
     * Loads paper information from the HTML, performs scraping, and writes the data into a XLSX file.
     *
     * @param \DOMDocument $dom The DOMDocument object representing the HTML structure of the webpage.
     * @param string $path The path where the XLSX file will be saved.
     */
    public function scrapAndWriteXlsx(\DOMDocument $dom, string $path): void {
      $papers = $this->scrap($dom); // Perform scraping to get the data

      // Write the scraped data into a XLSX file
      $this->write_xlsx($papers, $path);
    }
  public function scrap(\DOMDocument $document): array {
      $papers = [];
      $index = 0;

      $xpath = new DOMXPath($document);
      $paperElements = $xpath->query('//*[contains(@class, "paper-card")]');

      foreach ($paperElements as $paper) {
          $authors = [];

          $paperId = $xpath->query('//*[contains(@class, "volume-info")]', $paper)->item($index)->textContent;
          $paperTitle = $xpath->query('//*[contains(@class, "paper-title")]', $paper)->item($index)->textContent;
          $paperType = $xpath->query('//div[@class="tags mr-sm"]', $paper)->item($index)->textContent;
          $authorNodes = $xpath->query('.//div[@class="authors"]/span[@title]', $paper);

          foreach ($authorNodes as $authorNode) {
              $authorName = $authorNode->nodeValue;
              $authorInstitution = $authorNode->getAttribute('title');
              $authors[] = new Person($authorName, $authorInstitution);
          }

          $paperInstance = new Paper($paperId, $paperTitle, $paperType, $authors);
          $papers[] = $paperInstance;
        
          $index++;
      }

      return $papers;
  }

  public function write_xlsx(array $data, string $path): void {
      $formattedData = $this->format_data($data);

      $writer = WriterEntityFactory::createXLSXWriter();
      $writer->openToFile($path);

      //blackborder 
      $border = (new BorderBuilder())
      ->setBorderBottom(Color::BLACK, Border::WIDTH_THIN, Border::STYLE_SOLID)
      ->build();
      
      //style for rows
      $style = (new StyleBuilder())
      ->setFontBold()
      ->setBorder($border)
      ->setCellAlignment(CellAlignment::CENTER)
      ->build();

      //set styles
      $headerRow = WriterEntityFactory::createRowFromArray($formattedData[0]);
      foreach ($headerRow->getCells() as $cell) {
          $cell->setStyle($style);
      }
      $writer->addRow($headerRow);

      // Add remaining rows without style
      foreach (array_slice($formattedData, 1) as $dataRow) {
          $row = WriterEntityFactory::createRowFromArray($dataRow);
          $writer->addRow($row);
      }

      $writer->close();
  }

  public function format_data(array $data): array {
      $formattedData = [];
      //all model rows
      $formattedData[] = ['ID', 'Title', 'Type', 'Author 1', 'Author 1 Institution', 'Author 2', 'Author 2 Institution', 'Author 3', 'Author 3 Institution', 'Author 4', 'Author 4  Institution', 'Author 5', 'Author 5 Institution', 'Author 6', 'Author 6 Institution', 'Author 7', 'Author 7 Institution', 'Author 8', 'Author 8 Institution', 'Author 9',  'Author 9 Institution'];

      foreach ($data as $paper) {
          $formattedPaper = [
              $paper->id,
              $paper->title,
              $paper->type,
          ];

          foreach ($paper->authors as $author) {
              $formattedPaper[] = $author->name;
              $formattedPaper[] = $author->institution;
          }

          $formattedData[] = $formattedPaper;
      }

      return $formattedData;
  }
}
