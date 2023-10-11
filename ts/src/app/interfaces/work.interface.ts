import { ITopic } from './topic.interface';

export interface IWorkDetails {
  typeOfPresentation: string;
  thematicAxis: string;
  keywords: string[];
  authors: string[];
  legends: string[];
}

export interface IWorkIntroduction {
  title: string;
  author: string;
  imageUrl: string;
  institution: string;
  details: IWorkDetails;
}

export interface IWork extends IWorkIntroduction {
  id: string;
  annals: { title: string; subtitle: string; issn: string };
  summary: string[];
  topics: ITopic[];
}
