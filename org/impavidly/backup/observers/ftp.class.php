<?php
namespace Org\Impavidly\Backup\Observers;

class Ftp extends Common {
    protected $name = 'FTP Observer';

    public function update(\SplSubject $subject) {
        $command = "{$subject->wgetPath} --continue --mirror --directory-prefix={$subject->outputPath} ftp://{$subject->ftpUsername}:{$subject->ftpPassword}@{$subject->ftpHost}/{$subject->ftpPath} 2> {$subject->outputPath}/ftp_{$subject->ftpHost}.log";
        $status = $this->execute($subject, $command);

        return $status;
    }
}