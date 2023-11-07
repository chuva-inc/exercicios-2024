<?php

namespace Chuva\Php\WebScrapping\Entity;

use Box\Spout\Writer\Common\Creator\Style\StyleBuilder;
use Box\Spout\Writer\Common\Creator\WriterEntityFactory;

/**
 * The Spreadsheet class represents the Excel spreadsheet.
 */
class Spreadsheet {

  /**
   * Spreadsheet Writer.
   *
   * @var object
   */
  protected $writer;

  /**
   * Builder.
   */
  public function __construct($spreadsheetFile) {
    $this->writer = WriterEntityFactory::createXLSXWriter();
    $this->writer->openToFile($spreadsheetFile);

    // Defina um estilo personalizado para o cabeçalho.
    $headerFontStyle = (new StyleBuilder())
      ->setFontBold()
      ->setFontName('Arial')
      ->setFontSize(12)
      ->build();

    $headerRow = WriterEntityFactory::createRow([
      WriterEntityFactory::createCell("ID"),
      WriterEntityFactory::createCell("Title"),
      WriterEntityFactory::createCell("Type"),
      WriterEntityFactory::createCell("Author 1"),
      WriterEntityFactory::createCell("Author 1 Institution"),
      WriterEntityFactory::createCell("Author 2"),
      WriterEntityFactory::createCell("Author 2 Institution"),
      WriterEntityFactory::createCell("Author 3"),
      WriterEntityFactory::createCell("Author 3 Institution"),
      WriterEntityFactory::createCell("Author 4"),
      WriterEntityFactory::createCell("Author 4 Institution"),
      WriterEntityFactory::createCell("Author 5"),
      WriterEntityFactory::createCell("Author 5 Institution"),
      WriterEntityFactory::createCell("Author 6"),
      WriterEntityFactory::createCell("Author 6 Institution"),
      WriterEntityFactory::createCell("Author 7"),
      WriterEntityFactory::createCell("Author 7 Institution"),
      WriterEntityFactory::createCell("Author 8"),
      WriterEntityFactory::createCell("Author 8 Institution"),
      WriterEntityFactory::createCell("Author 9"),
      WriterEntityFactory::createCell("Author 9 Institution"),
    ]);

    $headerRow->setStyle($headerFontStyle);

    $this->writer->addRow($headerRow);
  }

  /**
   * Add a row of information to the spreadsheet.
   */
  public function addData($data) {
    $row = WriterEntityFactory::createRow([
      WriterEntityFactory::createCell($data->id),
      WriterEntityFactory::createCell($data->title),
      WriterEntityFactory::createCell($data->type),
    ]);

    $authors = $data->authors;
    for ($i = 0; $i < 9; $i++) {
      $author = $authors[$i] ?? NULL;

      if ($author) {
        $row->addCell(WriterEntityFactory::createCell($author->name));
        $row->addCell(WriterEntityFactory::createCell($author->institution));
      }
      else {
        // Se não houver autor, adicione células em branco.
        $row->addCell(WriterEntityFactory::createCell(''));
        $row->addCell(WriterEntityFactory::createCell(''));
      }
    }

    // Defina um estilo de fonte padrão para toda a planilha.
    $defaultFontStyle = (new StyleBuilder())
      ->setFontName('Arial')
      ->setFontSize(12)
      ->build();
    // Aplica o estilo de fonte padrão às células de dados.
    $row->setStyle($defaultFontStyle);

    $this->writer->addRow($row);
  }

  /**
   * Save changes.
   */
  public function save() {
    $this->writer->close();
  }

}
