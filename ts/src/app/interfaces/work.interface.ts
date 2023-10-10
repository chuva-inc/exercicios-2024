import { ITopic } from './topic.interface';

export interface IWorkDetails {
  typeOfPresentation: string;
  thematicAxis: string;
  keywords: string[];
  authors: string[];
  legends: string[];
}

export interface IWork {
  id: string;
  annals: { title: string; subtitle: string; issn: string };
  title: string;
  author: string;
  imageUrl: string;
  institution: string;
  details: IWorkDetails;
  summary: string[];
  topics: ITopic[];
}
