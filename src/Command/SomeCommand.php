<?php
// src/Command/SomeCommand.php
namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Helper\TableSeparator;
use Symfony\Component\Console\Helper\TableStyle;
use Symfony\Component\Console\Helper\TableCell;
use Symfony\Component\Console\Helper\TableCellStyle;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
// ...

class SomeCommand extends Command
{
    public function execute(InputInterface $input, OutputInterface $output)
    {
        Table::setStyleDefinition('colorful', $tableStyle);
        $table = new Table($output);
        $table->setStyle('colorful');
        $table
            ->setHeaders(['ISBN', 'Title', 'Author'])
            ->setRows([
                ['99921-58-10-7', 'Divine Comedy', 'Dante Alighieri'],
                ['9971-5-0210-0', 'A Tale of Two Cities', 'Charles Dickens'],
                new TableSeparator(),
                ['960-425-059-0', 'The Lord of the Rings', 'J. R. R. Tolkien'],
                ['80-902734-1-6', 'And Then There Were None', 'Agatha Christie'],
            ])
        ;
        $table->setHeaderTitle('Books');
        $table->setFooterTitle('Page 1/2');
        $table->setColumnWidth(0, 10);
        $table->setColumnWidth(2, 30);
        $table->setColumnMaxWidth(0, 5);
        $table->setColumnMaxWidth(1, 10);
        $table->setRows([
            [
                '978-0804169127',
                new TableCell(
                    'Divine Comedy',
                    [
                        'style' => new TableCellStyle([
                            'align' => 'center',
                            'fg' => 'red',
                            'bg' => 'green',
                            // or
                            'cellFormat' => '<info>%s</info>',
                        ])
                    ]
                )
            ],
        ]);
        $table->render();
    }
}
